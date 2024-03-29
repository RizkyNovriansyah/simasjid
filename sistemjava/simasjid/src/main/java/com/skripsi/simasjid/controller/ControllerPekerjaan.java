package com.skripsi.simasjid.controller;

import com.skripsi.simasjid.model.ModelDetailProgres;
import com.skripsi.simasjid.model.ModelPekerjaan;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

import java.security.Principal;
import java.util.ArrayList;
import java.util.List;
import java.util.Optional;

@Controller
public class ControllerPekerjaan extends BaseController {

    /*Iterasi Luar 1*/

    @RequestMapping("/pekerjaan")
    public String index(Model model, Principal principal) {
        int idPengguna = idLogged(principal);
        model.addAttribute("idPengguna", idPengguna);
        String peran = role(principal);
        if(peran.equalsIgnoreCase("sekertaris")|| peran.equalsIgnoreCase("ketua")
        || peran.equalsIgnoreCase("ketua rumah tangga")){
            model.addAttribute("isCan", 1);
        } else {
            model.addAttribute("isCan", 0);
        }
        model.addAttribute("pekerjaans", servicePekerjaan.findAll());
        return "pekerjaan/daftar_pekerjaan";
    }

    @RequestMapping(value = "/pekerjaan/detail/{id}", method = RequestMethod.GET)
    public String lihatDetailPekerjaan(@PathVariable Integer id, Model model, Principal principal) {
        int idPengguna = idLogged(principal);
        model.addAttribute("idPengguna", idPengguna);
        String peran = role(principal);
        if(peran.equalsIgnoreCase("sekertaris")|| peran.equalsIgnoreCase("ketua")){
            model.addAttribute("isCan", 1);
        }

        Optional<ModelPekerjaan> modelPekerjaan = servicePekerjaan.findById(id);
        String pic = serviceAnggota.getOne(modelPekerjaan.get().getAnggota()).getNama();
        model.addAttribute("namaPekerjaan", modelPekerjaan.get().getNamaPekerjaan());
        model.addAttribute("deskripsiPekerjaan", modelPekerjaan.get().getDeskripsi());
        model.addAttribute("statusPekerjaan", modelPekerjaan.get().getIdStatus());
        model.addAttribute("idAnggotaPekerjaan", modelPekerjaan.get().getAnggota());
        model.addAttribute("pic", pic);
        model.addAttribute("idPekerjaan", id);
        model.addAttribute("statusaktif", modelPekerjaan.get().getAktif());
        try {
            List<ModelDetailProgres> mdpList = serviceDetailProgres.findAll();
            List<ModelDetailProgres> mdpById = new ArrayList<>();
            for (ModelDetailProgres mdp : mdpList) {
                if (mdp.getPekerjaan() == id) {
                    mdp.setConvertedDate(mdp.getCreated());
                    mdpById.add(mdp);
                }
            }
            System.out.println("Berhasil memasukkan prores");
            model.addAttribute("progress", mdpById);
        } catch (Exception e) {
            System.out.println("ERROR : " + e);
            List<ModelDetailProgres> mdpList = new ArrayList<>();
            model.addAttribute("progress", mdpList);
        }

        return "pekerjaan/detail_pekerjaan";
    }

    @RequestMapping(value = "/pekerjaan/simpan", method = RequestMethod.POST)
    public String simpanPekerjaan(@ModelAttribute("ModelPekerjaan") ModelPekerjaan modelPekerjaan, BindingResult result) {
        modelPekerjaan.setIdStatus("0");
        modelPekerjaan.setAktif(1);
        servicePekerjaan.save(modelPekerjaan);
        return "redirect:/pekerjaan";
    }

    @RequestMapping(value = "/pekerjaan/hapusprogres/{idPekerjaan}/{idProgres}", method = RequestMethod.GET)
    public String hapusProgresPekerjaan(@PathVariable Integer idPekerjaan, @PathVariable Integer idProgres) {
        serviceDetailProgres.deleteById(idProgres);
        return "redirect:/pekerjaan/detail/" + idPekerjaan;
    }

    @RequestMapping(value = "/pekerjaan/edit/{id}", method = RequestMethod.GET)
    public String updateDataPekerjaan(@PathVariable Integer id, Model model) {
        model.addAttribute("pekerjaan", servicePekerjaan.findById(id));
        model.addAttribute("anggotas", getAnggotaAktif());
        return "pekerjaan/form_pekerjaan";
    }

    @RequestMapping(value = "/pekerjaan/hapus/{id}", method = RequestMethod.GET)
    public String hapusPekerjaan(@PathVariable Integer id) {
        ModelPekerjaan mp = servicePekerjaan.getOne(id);
        mp.setAktif(0);
        servicePekerjaan.save(mp);
        return "redirect:/pekerjaan";
    }

    @RequestMapping(value = "/pekerjaan/form")
    public String formPekerjaan(Model model) {
        model.addAttribute("anggotas", getAnggotaAktif());
        model.addAttribute("pekerjaan", new ModelPekerjaan());
        return "pekerjaan/form_pekerjaan";
    }

    /*Iterasi Luar 2*/

    @RequestMapping(value = "/pekerjaan/setstatus/{idPekerjaan}/{idStatus}", method = RequestMethod.GET)
    public String setStatusPekerjaan(@PathVariable Integer idPekerjaan, @PathVariable Integer idStatus) {
        ModelPekerjaan mp = servicePekerjaan.getOne(idPekerjaan);
        mp.setIdStatus(idStatus.toString());
        servicePekerjaan.save(mp);
        return "redirect:/pekerjaan/detail/" + idPekerjaan;
    }

}
