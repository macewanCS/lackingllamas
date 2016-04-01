<h1> Business Plan </h1>
<table>
                <tbody>
     @foreach($bpPlans as $bp)
        @if(substr_count($bp->ident, ".")==0)
        @if($temp = $bp->name)
        @endif
        <tr>

            <td>Goal</td>
            <td>1</td>
            <td>{{$bp->name}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        @endif
         @if(substr_count($bp->ident, ".")==1)
            <tr>

                <td>Objective</td>
                <td>1</td>
                <td>{{$temp}}</td>
                <td>--</td>
                <td>--</td>
                <td>{{$bp->name}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        @endif 
          @if(substr_count($bp->ident, ".")==2)
            <tr>

                <td>Action</td>
                <td>2</td>
                <td>{{$bp->description}}</td>

                <td>{{$bp->collaborators}}</td>
                <td>{{$bp->budget}}</td>
                <td>{{$bp->successMeasured}}</td>
                <td>{{$bp->date}}</td>
                <td>{{$bp->progress}}</td>
            </tr>         
        @endif
        @if(substr_count($bp->ident, ".")==3)
        <tr>

            <td>Task</td>
            <td>3</td>
            <td>{{$bp->description}}</td>

            <td>{{$bp->collaborators}}</td>
            <td>{{$bp->budget}}</td>
            <td>{{$bp->successMeasured}}</td>
            <td>{{$bp->date}}</td>
            <td>{{$bp->progress}}</td>
        </tr>         
        @endif
    @endforeach
                </tbody>
            </table>