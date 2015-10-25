<?php
use Illuminate\Database\Seeder;

use App\User;
use App\Bahagian;
use App\Cawangan;
use App\Level;
use App\Kategori;
use App\Peralatan;
use App\Aduan;
use App\Userstatus;
use App\Unit;
use App\Laporanstatus;

class UserTableSeeder extends Seeder {

    public function run() {

        // Table User

        User::create([ "username" => "suhairi", "password" => \Hash::make('suhairi'), "nama" => "SUHAIRI ABDUL HAMID", "jawatan" => "PENOLONG PEGAWAI TEKNOLOGI MAKLUMAT", "cawangan_id" => 2, "level_id" => 1, "status" => 1, "unit" => 1]);
        User::create([ "username" => "root", "password" => \Hash::make('suhairi'), "nama" => "SUHAIRI ABDUL HAMID", "jawatan" => "PENOLONG PEGAWAI TEKNOLOGI MAKLUMAT", "cawangan_id" => 2, "level_id" => 0, "status" => 1, "unit" => 1]);

        // Table Bahagian

        Bahagian::create(['id' => '13','nama' => 'Ibu Pejabat']);
        Bahagian::create(['id' => '1','nama' => 'Wilayah 1']);
        Bahagian::create(['id' => '3','nama' => 'Wilayah 3']);
        Bahagian::create(['id' => '4','nama' => 'Wilayah 4']);
        Bahagian::create(['id' => '2','nama' => 'Wilayah 2']);
        Bahagian::create(['id' => '5','nama' => 'Worksyop']);
        Bahagian::create(['id' => '6','nama' => 'KLM']);
        Bahagian::create(['id' => '7','nama' => 'EMPANGAN MUDA']);
        Bahagian::create(['id' => '8','nama' => 'EMPANGAN PEDU']);
        Bahagian::create(['id' => '9','nama' => 'EMPANGAN AH NING']);
        Bahagian::create(['id' => '11','nama' => 'PENGURUSAN WILAYAH']);
        Bahagian::create(['id' => '10','nama' => 'KILANG KORDIAL NAPOH']);
        Bahagian::where('id', '13')->update(['id' => '0']);

        // Table Cawangan

        Cawangan::create(['id' => '1','nama' => 'Khidmat Pengurusan','bahagian_id' => '0']);
        Cawangan::create(['id' => '2','nama' => 'Perancangan & Teknologi Maklumat','bahagian_id' => '0']);
        Cawangan::create(['id' => '3','nama' => 'Industri Padi','bahagian_id' => '0']);
        Cawangan::create(['id' => '4','nama' => 'Industri Asas Tani & Bukan Padi','bahagian_id' => '0']);
        Cawangan::create(['id' => '5','nama' => 'Pengurusan Wilayah','bahagian_id' => '0']);
        Cawangan::create(['id' => '6','nama' => 'Pengurusan Institusi Peladang','bahagian_id' => '0']);
        Cawangan::create(['id' => '7','nama' => 'Pengurusan Empangan & Sumber Air','bahagian_id' => '0']);
        Cawangan::create(['id' => '8','nama' => 'Mekanikal & Infrastruktur','bahagian_id' => '0']);
        Cawangan::create(['id' => '9','nama' => 'Perkhidmatan Pengairan & Saliran','bahagian_id' => '0']);
        Cawangan::create(['id' => '10','nama' => 'Wilayah','bahagian_id' => '1']);
        Cawangan::create(['id' => '11','nama' => 'A1 - Arau','bahagian_id' => '1']);
        Cawangan::create(['id' => '12','nama' => 'B1 - Kayang','bahagian_id' => '1']);
        Cawangan::create(['id' => '13','nama' => 'C1 - Kangar','bahagian_id' => '1']);
        Cawangan::create(['id' => '14','nama' => 'D1 - Tambun Tulang','bahagian_id' => '1']);
        Cawangan::create(['id' => '15','nama' => 'E1 - Simpang Empat','bahagian_id' => '1']);
        Cawangan::create(['id' => '16','nama' => 'Wilayah','bahagian_id' => '2']);
        Cawangan::create(['id' => '17','nama' => 'A2 - Kodiang','bahagian_id' => '2']);
        Cawangan::create(['id' => '18','nama' => 'B2 - Sanglang','bahagian_id' => '2']);
        Cawangan::create(['id' => '19','nama' => 'C2 - Kerpan','bahagian_id' => '2']);
        Cawangan::create(['id' => '20','nama' => 'D2 - Tunjang','bahagian_id' => '2']);
        Cawangan::create(['id' => '21','nama' => 'E2 - Kubang Sepat','bahagian_id' => '2']);
        Cawangan::create(['id' => '22','nama' => 'F2 - Jerlun','bahagian_id' => '2']);
        Cawangan::create(['id' => '23','nama' => 'G2 - Jitra','bahagian_id' => '2']);
        Cawangan::create(['id' => '24','nama' => 'H2 - Kepala Batas','bahagian_id' => '2']);
        Cawangan::create(['id' => '25','nama' => 'Wilayah','bahagian_id' => '3']);
        Cawangan::create(['id' => '26','nama' => 'A3 - Hutan Kampung','bahagian_id' => '3']);
        Cawangan::create(['id' => '27','nama' => 'B3 - Alor Senibong','bahagian_id' => '3']);
        Cawangan::create(['id' => '28','nama' => 'C3 - Tajar','bahagian_id' => '3']);
        Cawangan::create(['id' => '29','nama' => 'D3 - Titi Haji Idris','bahagian_id' => '3']);
        Cawangan::create(['id' => '30','nama' => 'E3 - Kokbah','bahagian_id' => '3']);
        Cawangan::create(['id' => '31','nama' => 'F3 - Pendang','bahagian_id' => '3']);
        Cawangan::create(['id' => '32','nama' => 'Wilayah','bahagian_id' => '4']);
        Cawangan::create(['id' => '33','nama' => 'A4 - Batas Paip','bahagian_id' => '4']);
        Cawangan::create(['id' => '34','nama' => 'B4 - Pengkalan Kundor','bahagian_id' => '4']);
        Cawangan::create(['id' => '35','nama' => 'C4 - Kangkong','bahagian_id' => '4']);
        Cawangan::create(['id' => '36','nama' => 'D4 - Permatang Buluh','bahagian_id' => '4']);
        Cawangan::create(['id' => '37','nama' => 'E4 - Bukit Besar','bahagian_id' => '4']);
        Cawangan::create(['id' => '38','nama' => 'F4 - Sungai Limau Dalam','bahagian_id' => '4']);
        Cawangan::create(['id' => '39','nama' => 'G4 - Guar Chempedak','bahagian_id' => '4']);
        Cawangan::create(['id' => '51','nama' => 'Worksyop','bahagian_id' => '5']);
        Cawangan::create(['id' => '42','nama' => 'I2 - Kuala Sungai','bahagian_id' => '2']);
        Cawangan::create(['id' => '43','nama' => 'KLM','bahagian_id' => '6']);
        Cawangan::create(['id' => '47','nama' => 'Empangan Muda','bahagian_id' => '7']);
        Cawangan::create(['id' => '48','nama' => 'Empangan Pedu','bahagian_id' => '8']);
        Cawangan::create(['id' => '49','nama' => 'Empangan Ahning','bahagian_id' => '9']);

        // Table Kategori

        Kategori::create(['id' => '2','nama' => 'PERISIAN','status' => 'active','unit' => '2']);
        Kategori::create(['id' => '3','nama' => 'VIRUS','status' => 'inactive','unit' => '2']);
        Kategori::create(['id' => '4','nama' => 'RANGKAIAN','status' => 'active','unit' => '3']);
        Kategori::create(['id' => '5','nama' => 'SISTEM','status' => 'active','unit' => '1']);
        Kategori::create(['id' => '1','nama' => 'PERKAKASAN','status' => 'active','unit' => '2']);
        Kategori::create(['id' => '9','nama' => 'BERKALA','status' => 'inactive','unit' => '2']);
        Kategori::create(['id' => '14','nama' => 'TEST 1','status' => 'inactive','unit' => '1']);
        Kategori::create(['id' => '15','nama' => 'TEST 2','status' => 'inactive','unit' => '2']);
        Kategori::create(['id' => '16','nama' => 'TEST 3','status' => 'inactive','unit' => '3']);

        // Table Level


        Level::create(['id' => '1','nama' => 'Admin']);
        Level::create(['id' => '2','nama' => 'Supervisor']);
        Level::create(['id' => '3','nama' => 'Technician']);
        Level::create(['id' => '4','nama' => 'User']);
        Level::create(['id' => '5','nama' => 'Data Entry']);
        Level::create(['id' => '0','nama' => 'Root']);

        Level::where('id', 6)->update(['id' => '0']);


        // Table Peralatan

        Peralatan::create(['id' => '10','nama' => 'MONITOR','kategori_id' => '1']);
        Peralatan::create(['id' => '13','nama' => 'PROFIL PELADANG','kategori_id' => '5']);
        Peralatan::create(['id' => '11','nama' => 'KEYBOARD','kategori_id' => '1']);
        Peralatan::create(['id' => '9','nama' => 'MICROSOFT OFFICE','kategori_id' => '2']);
        Peralatan::create(['id' => '52','nama' => 'CPU','kategori_id' => '1']);
        Peralatan::create(['id' => '36','nama' => 'OPERATING SYSTEM','kategori_id' => '2']);
        Peralatan::create(['id' => '12','nama' => 'INTERNET','kategori_id' => '4']);
        Peralatan::create(['id' => '14','nama' => 'GOE-EGDMS','kategori_id' => '5']);
        Peralatan::create(['id' => '15','nama' => 'SAGA','kategori_id' => '5']);
        Peralatan::create(['id' => '16','nama' => 'MYASSET','kategori_id' => '5']);
        Peralatan::create(['id' => '17','nama' => 'SUBSIDI','kategori_id' => '5']);
        Peralatan::create(['id' => '19','nama' => 'NOTEBOOK','kategori_id' => '1']);
        Peralatan::create(['id' => '20','nama' => 'SBPKP - SKIM BAJA PADI KERAJAAN PERSEKUTUAN','kategori_id' => '5']);
        Peralatan::create(['id' => '21','nama' => 'SPA - SISTEM PENGURUSAN AIR','kategori_id' => '5']);
        Peralatan::create(['id' => '22','nama' => 'SMP / PROJEK 10 TAN / SMP 10 TAN','kategori_id' => '5']);
        Peralatan::create(['id' => '39','nama' => 'UPS','kategori_id' => '1']);
        Peralatan::create(['id' => '24','nama' => 'HRMIS','kategori_id' => '5']);
        Peralatan::create(['id' => '25','nama' => 'SPPA - SISTEM PEMANTAUAN PENGURUSAN ASET','kategori_id' => '5']);
        Peralatan::create(['id' => '26','nama' => 'LAMAN WEB','kategori_id' => '5']);
        Peralatan::create(['id' => '86','nama' => 'VIRUS','kategori_id' => '1']);
        Peralatan::create(['id' => '28','nama' => 'PRIMARI PERTUBUHAN PELADANG','kategori_id' => '5']);
        Peralatan::create(['id' => '29','nama' => 'EMAIL','kategori_id' => '5']);
        Peralatan::create(['id' => '30','nama' => 'SISTEM MAKLUMAT USAHAWAN TANI','kategori_id' => '5']);
        Peralatan::create(['id' => '31','nama' => 'PENYELENGGARAAN','kategori_id' => '5']);
        Peralatan::create(['id' => '32','nama' => 'ADUAN','kategori_id' => '5']);
        Peralatan::create(['id' => '33','nama' => 'PERMOHONAN AHLI PPK','kategori_id' => '5']);
        Peralatan::create(['id' => '87','nama' => 'KOMPUTER','kategori_id' => '9']);
        Peralatan::create(['id' => '35','nama' => 'GIS','kategori_id' => '5']);
        Peralatan::create(['id' => '37','nama' => 'PRINTER','kategori_id' => '1']);
        Peralatan::create(['id' => '38','nama' => 'SCANNER','kategori_id' => '1']);
        Peralatan::create(['id' => '40','nama' => 'RAM','kategori_id' => '1']);
        Peralatan::create(['id' => '41','nama' => 'PLOTTER','kategori_id' => '1']);
        Peralatan::create(['id' => '42','nama' => 'AVR','kategori_id' => '1']);
        Peralatan::create(['id' => '43','nama' => 'MOUSE','kategori_id' => '1']);
        Peralatan::create(['id' => '44','nama' => 'VIRUS','kategori_id' => '3']);
        Peralatan::create(['id' => '45','nama' => 'UNINSTALL ANTI3','kategori_id' => '3']);
        Peralatan::create(['id' => '46','nama' => 'INSTALL ANTI3','kategori_id' => '3']);
        Peralatan::create(['id' => '47','nama' => 'PROJECTOR','kategori_id' => '1']);
        Peralatan::create(['id' => '48','nama' => 'SERVER','kategori_id' => '1']);
        Peralatan::create(['id' => '49','nama' => 'PENDRIVE','kategori_id' => '1']);
        Peralatan::create(['id' => '50','nama' => 'NETBOOK','kategori_id' => '1']);
        Peralatan::create(['id' => '51','nama' => 'AUTOCAD','kategori_id' => '2']);
        Peralatan::create(['id' => '53','nama' => 'PEMASANGAN PC BARU','kategori_id' => '1']);
        Peralatan::create(['id' => '54','nama' => 'PEMASANGAN PRINTER BARU','kategori_id' => '1']);
        Peralatan::create(['id' => '55','nama' => 'MOTHERBOARD','kategori_id' => '1']);
        Peralatan::create(['id' => '56','nama' => 'HARD DISK','kategori_id' => '1']);
        Peralatan::create(['id' => '57','nama' => 'BATERI CMOS','kategori_id' => '1']);
        Peralatan::create(['id' => '58','nama' => 'POWER SUPPLY','kategori_id' => '1']);
        Peralatan::create(['id' => '69','nama' => 'SOPPAN','kategori_id' => '5']);
        Peralatan::create(['id' => '68','nama' => 'DISK DEFRAGMENTATION','kategori_id' => '9']);
        Peralatan::create(['id' => '67','nama' => 'DISK CLEANUP','kategori_id' => '9']);
        Peralatan::create(['id' => '71','nama' => 'UPDATE ANTIVIRUS PATTERN','kategori_id' => '9']);
        Peralatan::create(['id' => '70','nama' => 'UPDATE SERVICE PATCH','kategori_id' => '9']);
        Peralatan::create(['id' => '72','nama' => 'UPDATE LICENCE ANTIVIRUS','kategori_id' => '9']);
        Peralatan::create(['id' => '73','nama' => 'ADAPTER','kategori_id' => '1']);
        Peralatan::create(['id' => '75','nama' => 'PREVENTIVE MAINTANANCE','kategori_id' => '9']);
        Peralatan::create(['id' => '84','nama' => '3 COM SWITCH','kategori_id' => '4']);
        Peralatan::create(['id' => '77','nama' => 'ADOBE','kategori_id' => '2']);
        Peralatan::create(['id' => '78','nama' => 'INTERNET EXPLORER','kategori_id' => '2']);
        Peralatan::create(['id' => '79','nama' => 'SHARING FOLDER & FAIL','kategori_id' => '4']);
        Peralatan::create(['id' => '80','nama' => 'MOUSE','kategori_id' => '1']);
        Peralatan::create(['id' => '81','nama' => 'MTS','kategori_id' => '5']);
        Peralatan::create(['id' => '85','nama' => 'BIOMETRIK','kategori_id' => '5']);

        User::create(['username' => 'saiful','password' => \Hash::make('password'),'nama' => 'Shaiful Azlimi Abdullah','jawatan' => 'Juruteknik Komputer (F17)','cawangan_id' => '2','level_id' => '3','status' => '1','unit' => '2','remember_token' => '']);
        User::create(['username' => 'fazli','password' => \Hash::make('password'),'nama' => 'Mohd Fadzly Abd Ghani','jawatan' => 'Pembantu Tadbir (N17)','cawangan_id' => '2','level_id' => '3','status' => '1','unit' => '2','remember_token' => '']);
        User::create(['username' => 'admin','password' => \Hash::make('password'),'nama' => 'Mohd Alias Hj Said','jawatan' => 'Pegawai Teknologi Maklumat (F41)','cawangan_id' => '2','level_id' => '1','status' => '1','unit' => '0','remember_token' => '']);
        User::create(['username' => 'asmahan','password' => \Hash::make('password'),'nama' => 'Cik Asmahan Sudin','jawatan' => 'Pembantu Tadbir (N17)','cawangan_id' => '2','level_id' => '4','status' => '0','unit' => '1','remember_token' => '']);
        User::create(['username' => 'lily','password' => \Hash::make('password'),'nama' => 'Juliana Abd Sattar','jawatan' => 'Pembantu Tadbir (N17)','cawangan_id' => '2','level_id' => '4','status' => '1','unit' => '0','remember_token' => '']);
        User::create(['username' => 'cluster','password' => \Hash::make('password'),'nama' => 'Cluster Teknologi (M) Sdn. Bhd.','jawatan' => 'Vendor','cawangan_id' => '2','level_id' => '3','status' => '1','unit' => '2','remember_token' => '']);
        User::create(['username' => 'alias','password' => \Hash::make('password'),'nama' => 'Mohd Alias Hj Said','jawatan' => 'Peg. Teknologi Maklumat (F41)','cawangan_id' => '2','level_id' => '2','status' => '1','unit' => '2','remember_token' => '']);
        User::create(['username' => 'anas','password' => \Hash::make('password'),'nama' => 'Anas Mohd Reza Abd Aziz','jawatan' => 'Juruteknik Komputer (F17)','cawangan_id' => '2','level_id' => '3','status' => '1','unit' => '2','remember_token' => '']);
        User::create(['username' => 'rohana','password' => \Hash::make('password'),'nama' => 'Rohana Binti Saad','jawatan' => 'Pen. Peg. Teknologi Maklumat ','cawangan_id' => '2','level_id' => '2','status' => '1','unit' => '1','remember_token' => '']);
        User::create(['username' => 'robiah','password' => \Hash::make('password'),'nama' => 'Robiah Bt Lazim','jawatan' => 'Pengarah','cawangan_id' => '2','level_id' => '1','status' => '1','unit' => '0','remember_token' => '']);
        User::create(['username' => 'afizan','password' => \Hash::make('password'),'nama' => 'Mohd Afizan Fazlime Aminuddin','jawatan' => 'Pen. Peg. Teknologi Maklumat (F29)','cawangan_id' => '2','level_id' => '3','status' => '1','unit' => '3','remember_token' => '']);
        User::create(['username' => 'ont','password' => \Hash::make('password'),'nama' => 'ONT SUCESS ENT.','jawatan' => 'Vendor','cawangan_id' => '2','level_id' => '3','status' => '1','unit' => '2','remember_token' => '']);
        User::create(['username' => 'teliti','password' => \Hash::make('password'),'nama' => 'Teliti','jawatan' => 'Vendor','cawangan_id' => '2','level_id' => '3','status' => '1','unit' => '2','remember_token' => '']);
        User::create(['username' => 'lily1','password' => \Hash::make('password'),'nama' => 'Juliana Abd Sattar','jawatan' => 'Pembantu Tadbir (N17)','cawangan_id' => '2','level_id' => '3','status' => '0','unit' => '1','remember_token' => '']);
        User::create(['username' => 'asmahan1','password' => \Hash::make('password'),'nama' => 'Cik Asmahan Sudin','jawatan' => 'Pembantu Tadbir (N17)','cawangan_id' => '2','level_id' => '3','status' => '0','unit' => '1','remember_token' => '']);
        User::create(['username' => 'Soffyan1','password' => \Hash::make('password'),'nama' => 'Soffyan Nadzri','jawatan' => 'Pen. Peg. Teknologi Maklumat (F29)','cawangan_id' => '2','level_id' => '2','status' => '1','unit' => '3','remember_token' => '']);
        User::create(['username' => 'marziani','password' => \Hash::make('password'),'nama' => 'Marziani Mahmud','jawatan' => 'Pen. Peg. Teknologi Maklumat (F29)','cawangan_id' => '2','level_id' => '3','status' => '1','unit' => '1','remember_token' => '']);
        User::create(['username' => 'abuhafiz','password' => \Hash::make('password'),'nama' => 'Muhamad Hafiz Ismail@Chik','jawatan' => 'Pembantu Tadbir (N17)','cawangan_id' => '2','level_id' => '3','status' => '1','unit' => '2','remember_token' => '']);
        User::create(['username' => 'cheamah','password' => \Hash::make('password'),'nama' => 'Che Amah Hussan','jawatan' => 'Pegawai Teknologi Maklumat (F48)','cawangan_id' => '2','level_id' => '1','status' => '0','unit' => '0','remember_token' => '']);
        User::create(['username' => 'shapari','password' => \Hash::make('password'),'nama' => 'Shapari Abdul Halim','jawatan' => 'Pegawai Teknologi Maklumat (F44)','cawangan_id' => '2','level_id' => '1','status' => '1','unit' => '0','remember_token' => '']);
        User::create(['username' => 'salmah','password' => \Hash::make('password'),'nama' => 'Salmah Hashim','jawatan' => 'Pen. Peg. Teknologi Maklumat (F29)','cawangan_id' => '2','level_id' => '1','status' => '0','unit' => '0','remember_token' => '']);
        User::create(['username' => 'asmahan2','password' => \Hash::make('password'),'nama' => 'Cik Asmahan Sudin','jawatan' => 'Pembantu Tadbir (N17)','cawangan_id' => '2','level_id' => '2','status' => '0','unit' => '3','remember_token' => '']);
        User::create(['username' => 'azlinais','password' => \Hash::make('password'),'nama' => 'Noor Azlina Ismail','jawatan' => 'Pegawai Teknologi Maklumat (F41)','cawangan_id' => '2','level_id' => '1','status' => '1','unit' => '1','remember_token' => '']);
        User::create(['username' => 'tech2','password' => \Hash::make('password'),'nama' => 'Tech 2','jawatan' => 'Tech 2','cawangan_id' => '2','level_id' => '3','status' => '0','unit' => '2','remember_token' => '']);
        User::create(['username' => 'subur','password' => \Hash::make('password'),'nama' => 'Subur Teknologi (M) Sdn. Bhd.','jawatan' => 'Vendor','cawangan_id' => '2','level_id' => '3','status' => '1','unit' => '2','remember_token' => '']);
        User::create(['username' => 'suzana','password' => \Hash::make('password'),'nama' => 'Suzana','jawatan' => 'Pembantu Tadbir (N17)','cawangan_id' => '2','level_id' => '2','status' => '0','unit' => '0','remember_token' => '']);
        User::create(['username' => 'farid','password' => \Hash::make('password'),'nama' => 'Ahmad Farid Bin Mohamad Ariff','jawatan' => 'Juruteknik Komputer (FT17)','cawangan_id' => '2','level_id' => '3','status' => '1','unit' => '2','remember_token' => '']);
        User::create(['username' => 'suzanactm','password' => \Hash::make('password'),'nama' => 'Suzana','jawatan' => 'Pembantu Tadbir (N17)','cawangan_id' => '2','level_id' => '4','status' => '0','unit' => '1','remember_token' => '']);
        User::create(['username' => 'soffyan','password' => \Hash::make('password'),'nama' => 'Soffyan Nadzri','jawatan' => 'Pen. Peg. Teknologi Maklumat (F29)','cawangan_id' => '2','level_id' => '3','status' => '1','unit' => '3','remember_token' => '']);
        User::create(['username' => 'shaiful','password' => \Hash::make('password'),'nama' => 'Shaiful Azlimi Abdullah','jawatan' => 'Juruteknik Kanan','cawangan_id' => '2','level_id' => '2','status' => '0','unit' => '2','remember_token' => '']);
        User::create(['username' => 'hpcentre','password' => \Hash::make('password'),'nama' => 'HP Centre','jawatan' => 'Vendor','cawangan_id' => '2','level_id' => '3','status' => '1','unit' => '2','remember_token' => '']);
        User::create(['username' => 'kulim','password' => \Hash::make('password'),'nama' => 'Kulim Technology','jawatan' => 'Vendor','cawangan_id' => '2','level_id' => '3','status' => '1','unit' => '2','remember_token' => '']);
        User::create(['username' => 'sonic','password' => \Hash::make('password'),'nama' => 'Sonic Technology Sdn. Bhd.','jawatan' => 'Vendor','cawangan_id' => '2','level_id' => '3','status' => '1','unit' => '2','remember_token' => '']);
        User::create(['username' => 'northen','password' => \Hash::make('password'),'nama' => 'Northen System','jawatan' => 'Vendor','cawangan_id' => '2','level_id' => '3','status' => '1','unit' => '2','remember_token' => '']);
        User::create(['username' => 'faxwell','password' => \Hash::make('password'),'nama' => 'Faxwell IT Service','jawatan' => 'Vendor','cawangan_id' => '2','level_id' => '3','status' => '1','unit' => '2','remember_token' => '']);
        User::create(['username' => 'rohana1','password' => \Hash::make('password'),'nama' => 'ROHANA BT SAAD','jawatan' => 'Pen. Peg. Teknologi Maklumat ','cawangan_id' => '2','level_id' => '3','status' => '1','unit' => '1','remember_token' => '']);
        User::create(['username' => 'maizan','password' => \Hash::make('password'),'nama' => 'Maizan Bt Abu Bakar','jawatan' => 'Pen. Peg Teknologi Maklumat','cawangan_id' => '2','level_id' => '2','status' => '1','unit' => '2','remember_token' => '']);
        User::create(['username' => 'maizan2','password' => \Hash::make('password'),'nama' => 'Maizan Bt Abu Bakar','jawatan' => 'Pen. Peg Teknologi Maklumat','cawangan_id' => '2','level_id' => '3','status' => '1','unit' => '2','remember_token' => '']);
        User::create(['username' => 'suhairi1','password' => \Hash::make('password'),'nama' => 'Suhairi Abdul Hamid','jawatan' => 'Pen. Peg. Teknologi Maklumat (F29)','cawangan_id' => '2','level_id' => '3','status' => '1','unit' => '1','remember_token' => '']);
        User::create(['username' => 'test3','password' => \Hash::make('password'),'nama' => 'Test 3','jawatan' => 'Test 3','cawangan_id' => '2','level_id' => '2','status' => '0','unit' => '3','remember_token' => '']);
        User::create(['username' => 'celestra','password' => \Hash::make('password'),'nama' => 'Celestra Network Communications Sdn.Bhd','jawatan' => 'Vendor','cawangan_id' => '2','level_id' => '3','status' => '1','unit' => '2','remember_token' => '']);
        User::create(['username' => 'test2','password' => \Hash::make('password'),'nama' => 'Test 2','jawatan' => 'Test 2','cawangan_id' => '2','level_id' => '2','status' => '0','unit' => '2','remember_token' => '']);
        User::create(['username' => 'tech1','password' => \Hash::make('password'),'nama' => 'Tech 1','jawatan' => 'Tech 1','cawangan_id' => '2','level_id' => '3','status' => '0','unit' => '1','remember_token' => '']);
        User::create(['username' => 'akmal','password' => \Hash::make('password'),'nama' => 'Mohd Akmal B Alias','jawatan' => 'Pen. Peg. Teknologi Maklumat (F29)','cawangan_id' => '2','level_id' => '3','status' => '1','unit' => '1','remember_token' => '']);
        User::create(['username' => 'test1','password' => \Hash::make('password'),'nama' => 'Test1','jawatan' => 'Test1','cawangan_id' => '2','level_id' => '2','status' => '0','unit' => '1','remember_token' => '']);
        User::create(['username' => 'tech3','password' => \Hash::make('password'),'nama' => 'Tech 3','jawatan' => 'Tech 3','cawangan_id' => '2','level_id' => '3','status' => '0','unit' => '3','remember_token' => '']);
        User::create(['username' => 'azlina','password' => \Hash::make('password'),'nama' => 'Noor Azlina Ismail','jawatan' => 'Pegawai Teknologi Maklumat (F41)','cawangan_id' => '2','level_id' => '2','status' => '1','unit' => '1','remember_token' => '']);
        User::create(['username' => 'ont1','password' => \Hash::make('password'),'nama' => 'ONT SUCESS ENT.','jawatan' => 'Vendor','cawangan_id' => '2','level_id' => '3','status' => '1','unit' => '3','remember_token' => '']);
        User::create(['username' => 'teliti1','password' => \Hash::make('password'),'nama' => 'Teliti','jawatan' => 'Vendor','cawangan_id' => '2','level_id' => '3','status' => '1','unit' => '3','remember_token' => '']);
        User::create(['username' => 'hpcentre1','password' => \Hash::make('password'),'nama' => 'HP Centre','jawatan' => 'Vendor','cawangan_id' => '2','level_id' => '3','status' => '1','unit' => '3','remember_token' => '']);
        User::create(['username' => 'kulim1','password' => \Hash::make('password'),'nama' => 'Kulim Technology','jawatan' => 'Vendor','cawangan_id' => '2','level_id' => '3','status' => '1','unit' => '3','remember_token' => '']);
        User::create(['username' => 'sonic1','password' => \Hash::make('password'),'nama' => 'Sonic Technology Sdn. Bhd.','jawatan' => 'Vendor','cawangan_id' => '2','level_id' => '3','status' => '1','unit' => '3','remember_token' => '']);
        User::create(['username' => 'northen1','password' => \Hash::make('password'),'nama' => 'Northen System','jawatan' => 'Vendor','cawangan_id' => '2','level_id' => '3','status' => '1','unit' => '3','remember_token' => '']);
        User::create(['username' => 'faxwell1','password' => \Hash::make('password'),'nama' => 'Faxwell IT Service','jawatan' => 'Vendor','cawangan_id' => '2','level_id' => '3','status' => '1','unit' => '3','remember_token' => '']);
        User::create(['username' => 'azlina2','password' => \Hash::make('password'),'nama' => 'Noor Azlina Ismail','jawatan' => 'Pegawai Teknologi Maklumat','cawangan_id' => '2','level_id' => '2','status' => '1','unit' => '3','remember_token' => '']);
        User::create(['username' => 'cluster1','password' => \Hash::make('password'),'nama' => 'Cluster Teknologi (M) Sdn. Bhd.','jawatan' => 'Vendor','cawangan_id' => '2','level_id' => '3','status' => '1','unit' => '3','remember_token' => '']);

        Aduan::create(['username' => 'lily', 'complaint' => 'This is a test message... please reply with anything']);

        Userstatus::create(['id' => '1', 'nama' => 'AKTIF']);
        Userstatus::create(['id' => '0', 'nama' => 'TIDAK AKTIF']);

        Laporanstatus::create(['id' => '1', 'nama' => 'Closing']);
        Laporanstatus::create(['id' => '2', 'nama' => 'Dalam Pelaksanaan']);
        Laporanstatus::create(['id' => '3', 'nama' => 'KIV']);
        Laporanstatus::create(['id' => '4', 'nama' => 'Selesai']);
        Laporanstatus::create(['id' => '5', 'nama' => 'Belum Selesai']);
        Laporanstatus::where('id', 5)->update(['id' => '0']);

        Userstatus::where('id', 2)->update(['id' => '0']);

        Unit::create(['nama' => 'APLIKASI / SISTEM']);
        Unit::create(['nama' => 'PERKAKASAN / MAINTENANCE']);
        Unit::create(['nama' => 'SERVER / NETWORK']);
        Unit::create(['nama' => 'ADMINISTATOR']);
        Unit::where('id', 4)->update(['id' => '0']);



    } // END run()
} // END CLASS