@if ($thread->created_by_user->id == $user->id)
    {{ __("you") }}
@else
    {{ $thread->created_by_user->getFullName(true) }}
@endif