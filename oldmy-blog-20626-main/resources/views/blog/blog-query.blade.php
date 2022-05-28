{{ $blog->title }}
<br>
{{ $blog->blogHasUser->name }}
<br>
<select name="" id="">
@foreach($users as $user)
    <option value="">{{$user->name}}</option>
@endforeach
</select>
