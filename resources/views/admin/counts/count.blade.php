@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Counts') }}</div>
                                
                   <div class="card-body">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            
                            <th>
                             <div class="alert alert-success">
                                      <strong>Clinic Counts</strong>         : <a href="#" class="alert-link"> <?php $pos=0 ?>
                                 @foreach ($clinics as $clinic)
                        
                                <?php $pos= $pos+1 ?>
                                
                                
                                 @endforeach
                                 <?php print  $pos ?>
                                     </a>
                                    </div>
                             
                            </th>                   
                          </tr>
                           <tr>
                           
                            <th>
                               <div class="alert alert-success">
                                      <strong>User Counts</strong>         : <a href="#" class="alert-link"> 

                                         <?php $pos=0 ?>
                                 @foreach ($users as $user)
                        
                                <?php $pos= $pos+1 ?>
                                
                                
                                 @endforeach
                                 <?php print  $pos ?>
                                     </a>
                                    </div>
          
                            </th>                   
                          </tr>
                        </thead>
                      </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
