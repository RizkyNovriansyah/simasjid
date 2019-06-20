package com.skripsi.simasjid.services;

import com.skripsi.simasjid.model.ModelAnggota;
import org.springframework.data.jpa.repository.JpaRepository;

public interface ServiceAnggota2 extends JpaRepository<ModelAnggota, Integer> {
    ModelAnggota findByUsername(String UserName);
}
