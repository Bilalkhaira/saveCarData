            @extends('frontend.master')
              
            @section('content')
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left text-center">
                        <h2>Car List By Api</h2>
                        <h4>User just see the all users car list</h4>
                    </div>
                </div>
            </div>

            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Model</th>
                    <th>Details</th>
                </tr>
            </table> 
            @endsection
            @section('js_content')
            <script type="text/javascript">
                window.onload = function() {
                    $.ajax({
                        url: "http://127.0.0.1:8000/api/list",
                        type: "GET",
                        success: function(resp){
                            console.log(resp);  
                            var count = 1;
                            var data = '';
                            $.each(resp, function(key, value) {
                                data = '<tr><td>'+count+'</td><td>'+value.name+'</td><td>'+value.model+'</td><td>'+value.detail+'</td></tr>';
                                $('.table').append(data);
                                count++;
                            });
                        }
                           
                    }); 
                }
            </script>

            @endsection