@if(Session::has('success'))
    <h3>{{Session::get("success")}}</h3>
@endif


<form action="/sender" method="POST">
    @csrf
    <input type="text" name="text">
    <input type="submit">
</form>
