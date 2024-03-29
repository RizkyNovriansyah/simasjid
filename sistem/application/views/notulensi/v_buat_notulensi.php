<style>
textarea {
	width:100%;
	box-sizing:border-box;
	display:block;
	max-width:100%;
	line-height:1.5;
	padding:15px 15px 30px;
	border-radius:3px;
	border:1px solid #F7E98D;
	font:13px Tahoma, cursive;
	transition:box-shadow 0.5s ease;
	box-shadow:0 4px 6px rgba(0,0,0,0.1);
	font-smoothing:subpixel-antialiased;
	background:linear-gradient(#F9EFAF, #F7E98D);
	background:-o-linear-gradient(#F9EFAF, #F7E98D);
	background:-ms-linear-gradient(#F9EFAF, #F7E98D);
	background:-moz-linear-gradient(#F9EFAF, #F7E98D);
	background:-webkit-linear-gradient(#F9EFAF, #F7E98D);
}
</style>
        
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Buat Notulensi</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item">Notulensi</li>
                        <li class="breadcrumb-item active">Buat Notulensi</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <form method="post" action="<?php echo base_url('MainNotulensi/storeNotulensi'); ?>">
                    <div class="row">
                        <!-- /# column -->
                        <div class="col-lg-12">
                            <div class="card">  
                                <h5> Deskripsi Musyawarah </h5>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Notulen <span class="required">*</span>
                                        </label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <select name="namaNotulen" id="namaNotulen" class="form-control">
                                                <option>Pilih Notulen</option>
                                                <?php foreach ($takmirs as $takmir): ?>
                                                    <option id="<?php echo $takmir->nama; ?>" value="<?php echo $takmir->id_anggota; ?>" <?php if( $takmir->id == $i_takmir) echo "selected"; ?>><?php echo $takmir->nama;?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Amir <span class="required">*</span>
                                        </label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <select name="namaAmir" id="namaAmir" class="form-control">
                                                <option>Pilih Amir</option>
                                                <?php foreach ($takmirs as $takmir): ?>
                                                    <option id="<?php echo $takmir->nama; ?>" value="<?php echo $takmir->id_anggota; ?>"><?php echo $takmir->nama;?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group" hidden>
                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Peserta musyawarah</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <select name="namaHadirin[]" id="namaHadirin[]" class="select2_multiple form-control" multiple="multiple">
                                                <?php foreach ($takmirs as $takmir): ?>
                                                    <option value="<?php echo $takmir->id_anggota; ?>"><?php echo $takmir->nama;?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body p-b-0">
                                    <h4 class="card-title">Tambah Laporan</h4>
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs customtab" role="tablist">
                                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home2" role="tab"><span class="hidden-sm-up"><i class="ti-pencil-alt2"></i></span> <span class="hidden-xs-down">Progres Lama</span></a> </li>
                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile2" role="tab"><span class="hidden-sm-up"><i class="ti-plus"></i></span> <span class="hidden-xs-down">Baru</span></a> </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="home2" role="tabpanel">
                                            <div class="p-20">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <select id="optionProgress" class="form-control col-md-11 col-sm-11 col-xs-12">
                                                        <option value="">Pilih Laporan</option>
                                                        <?php foreach ($proyeks as $proyek): ?>
                                                            <option value="<?php echo $proyek->id; ?>"><?php echo $proyek->nama_proyek;?></option>
                                                        <?php endforeach;?>
                                                    </select>
                                                    <br>
                                                    <a onclick="tambahProgres()" class="btn btn-primary">Tambah</a>
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="profile2" role="tabpanel">
                                            <div class="p-20">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <input type="text" id="namaProgress" class="form-control col-md-11 col-sm-11 col-xs-12" placeholder="Progress baru..">
                                                    <br>
                                                    <a onclick="tambahProgres()" class="btn btn-primary">Tambah</a>
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="tab-pane p-20" id="messages2" role="tabpanel">3</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">  
                            <div class="card">
                                <div id="kolomProgres" class="card-body">
                                    <label class="control-label col-md-12 col-sm-12 col-xs-12" for="first-name">Detail Laporan<span class="required">*</span>
                                    </label>  
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">  
                            <div class="card">
                                <div id="kolomMasukkan" class="card-body">
                                    <label class="control-label col-md-12 col-sm-12 col-xs-12" for="first-name">Tanggapan pekerjaan lain<span class="required">*</span>
                                    </label>
                                    <!-- <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input type="text" id="first-name" class="form-control col-md-7 col-xs-12">
                                        <a href="#" class="btn btn-primary">Tambah</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">  
                            <div class="card">
                                <div id="kolomKeputusan" class="card-body">
                                    <label class="control-label col-md-12 col-sm-12 col-xs-12" for="first-name">Keputusan<span class="required">*</span>
                                    </label>
                                    <!-- <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input type="text" id="first-name" class="form-control col-md-7 col-xs-12">
                                        <a href="#" class="btn btn-primary">Tambah</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <style> 
                            .bd-callout-warning {
                                border-left-color: #f0ad4e;
                            }
                            .bd-callout {
                                padding: 1.25rem;
                                margin-top: 1.25rem;
                                margin-bottom: 1.25rem;
                                border: 1px solid #eee;
                                border-left-width: .25rem;
                                border-radius: .25rem;
                            }
                        </style>
                        <div class="card col-lg-12">  
                            <div id="hasil"> 
                            </div>
                            <!-- <div class="bd-callout bd-callout-warning">
                                <h5 id="conveying-meaning-to-assistive-technologies">Progress </h5>
                                <p>Using color to add meaning only provides a visual indication, which will not be conveyed to users of assistive technologies – such as screen readers. Ensure that information denoted by the color is either obvious from the content itself (e.g. the visible text), or is included through alternative means, such as additional text hidden with the <code class="highlighter-rouge">.sr-only</code> class.</p>
                                <h5 id="conveying-meaning-to-assistive-technologies">Keputusan </h5>
                                <p>Using color to add meaning only provides a visual indication, which will not be conveyed to users of assistive technologies – such as screen readers. Ensure that information denoted by the color is either obvious from the content itself (e.g. the visible text), or is included through alternative means, such as additional text hidden with the <code class="highlighter-rouge">.sr-only</code> class.</p>
                            </div> -->

                            <button type="submit" class="btn btn-primary">Simpan</button>

                            <!-- The text field -->
                            <p id="error-details" hidden></p>
                            <button id="FailCopy" type="button"  
                                onclick="copyToClipboard('p#error-details')" class="btn btn-link">Salin</button>
                            <a href="whatsapp://send?text=">Bagikan ke WhatsApp</a>
                        </div>
                        

                        <!-- /# column -->
                    </div>
                </form>
                <!-- /# row -->
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">

    var tempIdPekerjaan = 0;
    
    function copyToClipboard(element) {
        var $temp = $("<textarea>");
        var brRegex = /<br\s*[\/]?>/gi;
        $("body").append($temp);
        $temp.val($(element).html().replace(brRegex, "\r\n")).select();
        document.execCommand("copy");
        $temp.remove();
    }

    $( "#FailCopy" ).click(function() {
        alert("Berhasil dicopy!");
    });

    function myFunction() {
        var brRegex = /<br\s*[\/]?>/gi;
        var copyText = document.getElementById("pwd_spn");
        var textArea = document.createElement("textarea");
        textArea.value = copyText.textContent;
        document.body.appendChild(textArea);
        textArea.select();
        document.execCommand("Copy");
        textArea.remove();
    }

    function tambahProgres(){
        if(document.getElementById("optionProgress").value == ""){
            var namaProgress = document.getElementById("namaProgress").value; 
            document.getElementById("namaProgress").value = "";
            tambahCard(namaProgress,0);

        } else {
            var idProgres = document.getElementById("optionProgress").value;
            console.log(idProgres);    
            $.get("<?php echo base_url('MainNotulensi/ajax_get_nama_pekerjaan_by'); ?>/"+idProgres, function(respond){
                var KK = JSON.parse(respond);
                var namaProgress = KK[0]['nama_proyek'];
                tambahCard(namaProgress,idProgres);
                document.getElementById("namaProgress").value = "";
                document.getElementById("optionProgress").value = "";
            });
            
        }
    }

    function tambahCard(namaProgress,idProgress){
        var sethtml = '<br><div class="card" style=""><div class="card-body"><h5 class="card-title">'+namaProgress+'</h5><input type="text" id="idProgress[]" name="idProgress[]" value='+idProgress+' hidden><input type="text" id="namaProgress[]" name="namaProgress[]" value="'+namaProgress+'" hidden><textarea id="progres[]" name="progres[]" onchange="tambahKeterangan('+tempIdPekerjaan+', 0)" class="form-control progres" aria-label="With textarea"></textarea><br><p class="text-danger" style="float:left">hapus</p><p onclick="resetKeterangan('+tempIdPekerjaan+',0)" style="float:right" class="text-warning col-sx-6">Reset</p></div></div>'
        $("#kolomProgres").append(sethtml);
        autosize(document.getElementsByClassName('progres'+tempIdPekerjaan));
        var sethtml = '<br><div class="card" style=""><div class="card-body"><h5 class="card-title">'+namaProgress+'</h5><p id="kontendariprogres'+tempIdPekerjaan+'" class="kontendariprogres'+tempIdPekerjaan+'"></p><textarea id="masukkan[]" name="masukkan[]"  onchange="tambahKeterangan('+tempIdPekerjaan+', 1)" class="form-control masukkan" aria-label="With textarea"></textarea><br><p onclick="resetKeterangan('+tempIdPekerjaan+',1)" style="float:right" class="text-warning col-sx-6">Reset</p></div></div>'
        $("#kolomMasukkan").append(sethtml);
        autosize(document.getElementsByClassName('kontendariprogres'+tempIdPekerjaan));
        var sethtml = '<br><div class="card" style=""><div class="card-body"><h5 class="card-title">'+namaProgress+'</h5><p id="kontendarimasukkan'+tempIdPekerjaan+'" class="kontendarimasukkan'+tempIdPekerjaan+'"></p><textarea id="keputusan[]" name="keputusan[]" onchange="tambahKeterangan('+tempIdPekerjaan+', 2)" class="form-control keputusan" aria-label="With textarea"></textarea><br><p onclick="resetKeterangan('+tempIdPekerjaan+',2)" style="float:right" class="text-warning col-sx-6">Reset</p></div></div>'
        $("#kolomKeputusan").append(sethtml);
        autosize(document.getElementsByClassName('kontendarimasukkan'+tempIdPekerjaan));

        var sethtml = '<div class="bd-callout bd-callout-warning"><h3 id="conveying-meaning-to-assistive-technologies">'+namaProgress+'</h3><p id="hasilkontendariprogres'+tempIdPekerjaan+'" class="hasilkontendariprogres'+tempIdPekerjaan+'"></p><h6 id="conveying-meaning-to-assistive-technologies">Keputusan </h6><p id="hasilkontendarimasukkan'+tempIdPekerjaan+'" class="hasilkontendarimasukkan'+tempIdPekerjaan+'"></p></div>';
        $("#hasil").append(sethtml);
        ++tempIdPekerjaan;
    }

    function tambahKeterangan(nilai, keputusan){
        console.log('id : '+ nilai + '. keputusan -> '+ keputusan);
        if(keputusan == 0) {
            var contentProgress = document.getElementsByClassName("progres"); 
            console.log(contentProgress[nilai].value);
            var sethtml = ''+contentProgress[nilai].value;
            
            $(".kontendariprogres"+nilai).empty();
            $(".kontendariprogres"+nilai).append(sethtml);
            $(".hasilkontendariprogres"+nilai).empty();
            $(".hasilkontendariprogres"+nilai).append(sethtml);
        } else if(keputusan == 1){
            var contentProgress1 = document.getElementsByClassName("progres"); 
            console.log(contentProgress1[nilai].value);
            var contentProgress2 = document.getElementsByClassName("masukkan"); 
            var sethtml = '<i class="fa fa-comment-o" aria-hidden="true"></i> : '+contentProgress1[nilai].value+'<br><i class="fa fa-comments-o" aria-hidden="true"></i> : '+contentProgress2[nilai].value;
            
            $(".kontendarimasukkan"+nilai).empty();
            $(".kontendarimasukkan"+nilai).append(sethtml);
            $(".hasilkontendariprogres"+nilai).empty();
            $(".hasilkontendariprogres"+nilai).append(sethtml);
        } else {	
            var contentKeputusan = document.getElementsByClassName("keputusan"); 
            console.log(contentKeputusan[nilai].value);
            var sethtml = ''+contentKeputusan[nilai].value;
            $(".hasilkontendarimasukkan"+nilai).empty();
            $(".hasilkontendarimasukkan"+nilai).append(sethtml);
        }
        setMsg();
    }

    function getName(text){
        var str = text;
        var res = str.split("%");
        return res[1];
    }

    function setMsg(){
        var notulen = "";
        var amir = "";
        notulen = $("#namaNotulen").children(":selected").attr("id");
        amir = $("#namaAmir").children(":selected").attr("id");
        // var notulen = getName(document.getElementById("namaNotulen").value); 
        // var amir = getName(document.getElementById("namaAmir").value); 
        // var hadirin = getName(document.getElementById("namaHadirin").value);
        
        var index, len, msg = '';
        msg += 'Musyawarah Masjid 06 Apr 2019';
        msg += '<br>Amir : '+notulen;
        msg += '<br>Notulen : '+amir;
        msg += '<br><br>Hasil Kegiatan Musyawarah';

        var contentProgress = document.getElementsByClassName("progres"); 
        var contentMasukkan = document.getElementsByClassName("masukkan"); 
        var contentKeputusan = document.getElementsByClassName("keputusan"); 
        
        for (index = 0, len = contentProgress.length; index < len; ++index) {
            msg += '<br>'+(index+1)+'. laporan : '+contentProgress[index].value;
            msg += '<br>masukkan : '+contentMasukkan[index].value;
            msg += '<br>keputusan : '+contentKeputusan[index].value;
            console.log('setmsg : '+msg);
        }
        $("#error-details").empty();
        $("#error-details").append(msg);
        
    }

    function resetKeterangan(nilai, keputusan){
        if(keputusan == 0) {
            document.getElementsByClassName("progres"+nilai).value = "";
        } else if(keputusan == 1){
            document.getElementsByClassName("masukkan"+nilai).value = "";
        } else {	
            document.getElementsByClassName("keputusan"+nilai).value = "";
        }
        tambahKeterangan(nilai,keputusan);
    }

</script>