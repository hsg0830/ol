@if (Auth::guard('web')->check())
<div class="favorite-btn">
    <template v-if="isFollowing">
      <div class="favorite-btn__wrapper">
        <div class="favorite-btn__exp">
          보관함에 보관해둔 기사를 보관함에서 삭제할수 있습니다.→
        </div>
        <button class="favorite-btn__btn active" type="button" @click="unfollow"><i class="fas fa-bookmark"></i></button>
      </div>
    </template>
    <template v-else>
      <div class="favorite-btn__wrapper">
        <div class="favorite-btn__exp">
          기사를 보관함에 보관해두고 <a href="{{ route('users.show', Auth::user()) }}" class="text-underline-link">【회원정보】</a>페지에서 확인할수 있습니다.→
        </div>
        <button class="favorite-btn__btn" type="button" @click="follow"><i class="far fa-bookmark"></i></button>
      </div>
    </template>
  </div>
@endif
