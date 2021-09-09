<!DOCTYPE html>
<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Live Search</title>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Accounts info </h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <input type="text" class="form-controller" id="search" name="search"></input>
                    </div>
                    <div class="form-group">
                        <select name="search_selection" class="form-controller" id="search-selection">
                            <option value="id">id</option>
                            <option value="username">username</option>
                            <option value="first_name">first_name</option>
                            <option value="last_name">last_name</option>
                            <option value="email">email</option>
                            <option value="phone">phone</option>
                            <option value="gender">gender</option>
                            <option value="dob">dob</option>
                            <option value="credits">credits</option>
                            <option value="description">description</option>
                            <option value="created_at">created_at</option>
                        </select>
                        
                    </div>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Gender</th>
                                <th>D.O.B</th>
                                <th>Credits</th>
                                <th>Description</th>
                                <th>Created_at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($accounts as $account)
                                <tr>
                                    <td>{{$account->id}}</td>
                                    <td>{{$account->username}}</td>
                                    <td>{{$account->first_name}}</td>
                                    <td>{{$account->last_name}}</td>
                                    <td>{{$account->email}}</td>
                                    <td>{{$account->phone}}</td>
                                    <td>{{$account->gender}}</td>
                                    <td>{{$account->dob}}</td>
                                    <td>{{$account->credits}}</td>
                                    <td>{{$account->description}}</td>
                                    <td>{{$account->created_at}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        
        $('#search').on('keyup', function () {
            $value = $(this).val();
            $search_selection =$("#search-selection").val();
            $.ajax({
                type: 'get',
                url: '{{ URL::to('search') }}',
                data: {
                    'search': $value,
                    'search_selection' : $search_selection
                },
                success: function (data) {
                    $('tbody').html(data);
                }
            });
        })

    </script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>
</body>

</html>
