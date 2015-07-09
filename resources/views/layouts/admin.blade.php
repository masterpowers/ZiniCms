<!DOCTYPE html>
<html lang="en" ng-app="hrgApp">
    <head>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
        <link href='http://fonts.googleapis.com/css?family=Raleway:500,600,700,800,900,400,200,300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400ital...;' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{{-- asset('assets/css/dashboard.css') --}}">
        <title>Dashboard</title>

    </head>
    <body>
        <div class="container">
            @include('admin.inc.nav')
            @if(Session::has("global"))
            <p class="alert alert-info">
                {{ Session::get("global") }}
            </p>
            @endif
            @yield('content')
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        <script src="//cdn.ckeditor.com/4.4.7/full/ckeditor.js"></script>
        <script src="{{-- asset('assets/js/dashboard/jquery.sortable.js') --}}"></script>
        <script src="{{-- asset('assets/js/dashboard/jquery.tableFilter.js') --}}"></script>
        <script src="{{-- asset('assets/js/dashboard/functions.js') --}}"></script>
        <script>
//            $('.sorted_table').sortable({
//                containerSelector: 'table',
//                itemPath: '> tbody',
//                itemSelector: 'tr',
//                placeholder: '<tr class="placeholder"/>',
//                onDrop: function  (item, container, _super) {
//                    var sortOrder = [];
//                    $("tbody tr").each(function(index){
//                        var id = $(this).find("td.id").text();
//                        var sort = $(this).find("td.sort").text();
//                        if(sort !=(index+1)){
//                            sortOrder.push({"index": index+1, "id": id});
//                        }
//                    });
//                    _super(item);
//                    $.ajax({
//                        type: "POST",
//                        url: "{{-- URL::route('save-concepts-order') --}}",
//                        dataType:"json",
//                        data: {_token: "{{-- csrf_token() --}}", orderArray: sortOrder},
//                        success: function(data){
//                            return "Successful!";
//                        }
//                    });
//                }
//            });

            $(".deleteLink").click(function(e){
                var link = $(this).attr("data-target");
//                alert(link);
                $.ajax({
                    url: link,
                    type: 'POST',
                    data:{
                        _method:"DELETE",
                        _token:"{{ csrf_token() }}"
                    },
                    success: function(results) {
                        alert(results);
                    }
                });
            });
        </script>
    </body>
</html>
