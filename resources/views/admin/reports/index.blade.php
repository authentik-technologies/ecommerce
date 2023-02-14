@extends('admin.layouts.master')
@section('admin')

<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Rapports de ventes</div>
        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-3">
					<div class="col">
						<div class="card">
							<div class="card-body">
                                <form method="post" action="{{ route('admin.reports.date') }}">
                                    @csrf
								<h5 class="card-title">Recherche par date</h5>
                                <label class="form-label">Sélectionnez la date</label>
                                <input type="date" name="date" class="form-control">
                                <br>
                                <input type="submit" class="btn btn-dark px-5" value="Rechercher"></input>	
                                </form>
                            </div>
						</div>
					</div>
					<div class="col">
						<div class="card">
							<div class="card-body">
                                <form>
                                    @csrf
								<h5 class="card-title">Recherche par mois</h5>
                                <label class="form-label">Sélectionnez le mois</label>
                                <select id="month" name="month" class="form-select mb-3" aria-label="Default select example">
								</select>
                                <label class="form-label">Sélectionnez l'année</label>
                                <select id="year" name="year" class="form-select mb-3" aria-label="Default select example">
								</select>
                                <input type="submit" class="btn btn-dark px-5" value="Rechercher"></input>	
                                </form>								
                            </div>
						</div>
					</div>
					<div class="col">
						<div class="card">
							<div class="card-body">
                                <form>
                                @csrf
								<h5 class="card-title">Recherche par années</h5>
                                <select id="year2" name=year" class="form-select mb-3" aria-label="Default select example">
								</select>	
                                <input type="submit" class="btn btn-dark px-5" value="Rechercher"></input>	
                                </form>					
                            </div>
						</div>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>

@endsection