@extends('layouts.members')

@section('content')

    <div class="row">
        <div class="col-xs-8">

            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Trimming process of laporan.csv</h4></div>
                <div class="panel-body">
                    <ul>
                        <li><strong>First : Export laporan.csv table from the source DB.</strong></li>
                        <li><strong>The Trim Process 1</strong>
                            <ol>
                                <li>Export laporan.csv from source DB server</li>
                                <li>replace id column to sorting numbers 1 - xx from random numbers</li>
                                <li>laporan.csv - change the tarikh and tarikhSiap format to yyyy-mm-dd</li>
                            </ol>
                        <li><strong>The Trim Process 2</strong>
                            <ol>
                                <li>create a dummy structure to local the same structe from source DB server</li>
                                <li>change tarikh and tarikhSiap column to date format</li>
                                <li>ALTER TABLE `laporan` CHANGE `noJobsheet` `noJobsheet` VARCHAR(7) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL;</li>
                                <li>import in the exported laporan.csv to dummy DB</li>
                                <li>alter table laporan drop column masa, drop column unit, drop column kategori;</li>
                                <li>update laporan set kawasan = bahagian where kawasan = 'Wilayah';</li>
                                <li>alter table laporan drop column bahagian;</li>
                            </ol>
                        </li>
                        <li><strong>The Trim Process 3</strong>
                            <ol>
                                <li>update laporan set kawasan = 10 where kawasan like '%1';</li>
                                <li>update laporan set kawasan = 16 where kawasan like '%2';</li>
                                <li>update laporan set kawasan = 25 where kawasan like '%3';</li>
                                <li>update laporan set kawasan = 32 where kawasan like '%4';</li>
                                <li>update laporan as a, cawangan as b set a.kawasan = b.id where a.kawasan = b.nama;</li>
                                <li>update laporan as a, peralatan as b set a.peralatan = b.id where a.peralatan = b.nama;</li>
                                <li>update laporan set peralatan = 3 where peralatan like '%virus%';</li>
                                <li>update laporan set peralatan = 14 where peralatan like '%goe%';</li>
                                <li>update laporan set peralatan = 85 where peralatan like '%biometrik%';</li>
                                <li>delete from laporan where peralatan = '';</li>
                                <li>update laporan set noSiri = '000000' where noSiri = 'nil';</li>
                                <li>update laporan set noSiri = '000000' where noSiri = '';</li>
                                <li>delete from laporan where pelapor = '';</li>
                                <li>delete from laporan where kawasan = '';</li>
                                <li>delete from laporan where kawasan = '';</li>
                                <li>update laporan as a, laporanstatus as b set a.status = b.id where a.status = b.nama;</li>
                                <li>update laporan set status = '2' where status like '%dalam%';</li>
                                <li>update laporan set status = '0' where status like '%belum%';</li>
                                <li>update laporan as a, user as b set a.disenggara = b.username where a.disenggara like concat(b.nama, '%');</li>
                                <li>delete from laporan where disenggara like '%pilih%';</li>
                                <li>delete from laporan where disenggara like '%mahmud%';</li>
                                <li>delete from laporan where disenggara like '%haswandi%';</li>
                                <li>delete from laporan where disenggara like '%telekom%';</li>
                                <li>update laporan set disenggara = 'northen' where disenggara like '%north%';</li>
                                <li>alter table `laporan` add `created_at` TIMESTAMP NOT NULL AFTER `catatan`, add `updated_at` TIMESTAMP NOT NULL AFTER `created_at`;</li>
                            </ol>
                        </li>
                        <li><strong>LAST : export the database to laporan.csv and save it in database folder in Laravel folder to be import after the migration and seeding...</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@stop