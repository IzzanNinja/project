@extends('navigation')

@section('navigation')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Permohonan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Laman Utama</a></li>
                        <li class="breadcrumb-item active">Paparan Utama</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Status</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 1%">Bil.</th>
                                <th style="width: 30%">Permohonan</th>
                                <th style="width: 30%">Profil</th>
                                <th style="width: 10%">Status</th>
                                <th style="width: 10%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>
                                    <a>Permohonan Daftar Subsidi Petani</a>
                                    <br />
                                    <small>Didaftar 01.01.2019</small>
                                </td>
                                <td>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a class="nav-link" href="#" id="logoutDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                {{ Auth::user()->name }}
                                            </a></li>
                                    </ul>
                                </td>
                                <td class="project-state">
                                    <span class="badge badge-success">Berjaya didaftarkan</span>
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-primary btn-sm" href="#">
                                        <i class="fas fa-folder"></i>
                                        Lihat
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>
                                    <a>Permohonan Tuntutan Subsidi Petani</a>
                                    <br />
                                    <small>Didaftar 01.03.2019</small>
                                </td>
                                <td>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">Karyn Mckhee</li>
                                    </ul>
                                </td>
                                <td class="project-state">
                                    <span class="badge badge-success">Menunggu Kelulusan</span>
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-primary btn-sm" href="#">
                                        <i class="fas fa-folder"></i>
                                        Lihat
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
