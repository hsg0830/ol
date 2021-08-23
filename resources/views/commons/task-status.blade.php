@if (!is_null($task))
  @auth('web')
    <div class="task-status">
      <p class="task-status__desc">
        <span>{{ $task->start }}〜{{ $task->end }}</span>의 학습과제입니다.
      </p>

      <div class="task-status__status" v-if="isCleared">
        <span class="task-status__status__badge">수행함</span>
        이달 학습과제를 확인하실 경우에는 <a href="{{ route('tasks.index') }}" class="text-underline-link">【여기】</a>로.
        {{-- <button @click="changeTaskStatus" class="global-btn">완료보고취소</button> --}}
      </div>
      <div v-else>
        <span class="task-status__status__badge un-cleared">미수행</span>
        학습을 완료하신 경우에는 완료보고를 하여주십시오. →
        <button @click="changeTaskStatus" class="global-btn">완료보고</button>
      </div>
    </div>
  @endauth
@endif
