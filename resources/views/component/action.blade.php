<div class="row">
    <div class="col-2">
        <a class="" href="{{route($route.'.edit', $id)}}" title="Edit">
            <i class="fas fa-pencil-alt"></i>
        </a>
    </div>
    <div class="col-auto"></div>
    <div class="col-2">
        <form method="POST" action="{{route($route.'.destroy', $id)}}">
            @csrf
            @method('DELETE')
            <button class="btn btn-link p-0 " value="submit" type="submit"
                    onclick="return  confirm('Are you sure you want to remove?');">
                <i class="fa fa-trash"></i>
            </button>
        </form>
    </div>


</div>
