<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>PDO - Read Records - PHP CRUD Tutorial</title>
    </head>
    <body>
        <div class="container">
            <div class="page-header">
                <h1>{{trans('website.std')}}</h1>
                <br>
                <br>
                <a href="{{url('Student/logout')}}">{{trans('website.logout')}}</a> || <a href="{{url('Users/create')}}">{{trans('website.create')}}</a>
                <a href="{{url('/Lang/en')}}">EN</a> || <a href="{{url('/Lang/ar')}}">AR</a>

            </div>

            <table class="table table-hover table-resposive table-bordered">
                <tr>
                    <th>#</th>
                    <th>{{trans('website.id')}}</th>
                    <th>{{trans('website.name')}}</th>
                    <th>{{trans('website.email')}}</th>
                    <th>{{trans('website.department')}}</th>
                    <th>{{trans('website.action')}}</th> 

                </tr>
<?php $i=1;?>
@foreach ($data as $fetchedData)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$fetchedData->id}}</td>
                    <td>{{$fetchedData->name}}</td>
                    <td>{{$fetchedData->email}}</td>
                    <td>{{$fetchedData->department->title}}</td>
                    <td>
                        <a href="" data-toggle="modal" data-target="#modal_single_del{{$fetchedData->id}}">{{trans('website.delete')}}</a>                        
                        <a href='{{url('/Users/'.$fetchedData->id.'/edit')}}' class="btn btn-primary m-r-1em">{{trans('website.edit')}}</a> 
                    </td>
                </tr>
                

        <div class="modal" id="modal_single_del{{$fetchedData->id}}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">delete confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        student : {{$fetchedData->name}}
                    </div>
                    <div class="modal-footer">
                        <form action="{{url('Users/'.$fetchedData->id)}}" method="post">
                            @method('delete')
                            @csrf
                            <div class="not-empty-record">
                                <button type="submit">Delete</button>
                                <button type="submit" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

                            
           

    
@endforeach               

  
            <tr>
              {{--        <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['name']; ?></td>
                <td><?php echo $data['email']; ?></td>
                <td><?php echo $data['title']; ?></td>
                <td><?php if(!empty($data['gov'])) {echo $data['gov'];} else {echo '-' ;}?></td>
                <td><?php if(!empty($data['city'])) {echo $data['city'];} else {echo '-' ;}?></td>
                <td><?php if(!empty($data['extradata'])) {echo $data['extradata'];} else {echo '-' ;}?></td>

                <td>
             <a href="delete.php?id=<?php echo $data['id'];?>" class="btn btn-danger m-r-1em">Delete</a>
             <a href="edit.php?id=<?php echo $data['id'];?>" class="btn btn-primary m-r-1em">Edit</a> --}}
                </td> 


                
            </tr>
            </table>
            {{$data->links()}}
        </div>
        
    </body>
</html>
