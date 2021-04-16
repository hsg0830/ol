@extends('layouts.editor')

@section('title', '얼 -- メディア管理画面')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/editor.css') }}">
@endsection

@section('content')

  <div id="app">
    <h1 class="page-title">メディア管理画面</h1>

    {{-- ファイルアップロードブロック --}}
    <div id="file-upload" class="my-3 mx-auto p-3 p-md-5 border">

      <div class="mb-5">
        <p class="label">ファイルの種類を選んでください</p>
        {{-- <label for="type" class="form-label mr-3">ファイルの種類</label> --}}
        <select id="type" class="form-select" v-model="uploadType" @change="clearPreview">
          <option v-for="(value, key) in types" v-text="value" :value="key"></option>
        </select>
      </div>

      {{-- imageの場合 --}}
      <div v-if="parseInt(uploadType) === 1">
        <p class="label">画像ファイルを選択してください</p>
        <div class="mb-5 input-group">
          {{-- <label for="image" class="input-group-text">画像ファイルを選択してください</label> --}}
          <input class="form-control" type="file" accept=".jpg,.jpeg,.png,.gif, image/jpeg,image/png,image/gif" id="image"
            ref="image" @change="onFileChange">
        </div>

        <div class="mb-5">
          <img v-show="previewImage" :src="previewImage" alt="" />
        </div>

        <p class="label">ファイルの説明を入力してください</p>
        <div class="mb-5">
          {{-- <label for="memo1" class="form-label">ファイルの説明を入力してください</label> --}}
          <input class="form-control" type="text" id="memo1" v-model="memo">
        </div>
      </div>

      {{-- videoの場合 --}}
      <div v-else-if="parseInt(uploadType) === 2">
        <p class="label">動画ファイルを選択してください</p>
        <div class="mb-5 input-group">
          {{-- <label for="video" class="input-group-text">動画ファイルを選択してください</label> --}}
          <input class="form-control" type="file" accept="video/mp4" id="video" ref="video" @change="onFileChange">
        </div>

        <p class="label">サムネイル用の画像ファイルを選択してください</p>
        <div class="mb-5 input-group">
          {{-- <label for="poster" class="input-group-text">サムネイル用の画像ファイルを選択してください</label> --}}
          <input class="form-control" type="file" accept="image/*" id="poster" ref="poster" @change="onPosterChange">
        </div>

        <div class="mb-5">
          <img v-show="previewImage" :src="previewImage" alt="" />
        </div>

        <p class="label">ファイルの説明を入力してください</p>
        <div class="mb-5">
          {{-- <label for="memo2" class="form-label">ファイルの説明を入力してください</label> --}}
          <input class="form-control" type="text" id="memo2" v-model="memo">
        </div>
      </div>

      <div class="d-grid gap-2 mb-5">
        <button type="button" class="btn btn-primary" @click=onUpload>ファイルをアップロード</button>
      </div>

      <div class="d-grid gap-2 mb-5">
        <button class="btn btn-success" @click="modalOpen">保存されているメディアの一覧</button>
      </div>
    </div>

    {{-- ファイル閲覧用モーダル --}}
    <div class="modal js-modal">
      <div class="modal__bg js-modal-close" @click="modalClose"></div>

      <div class="modal__content">

        <h2>保存されているファイル一覧</h2>

        <div class="input-group mb-3">
          <label for="type" class="form-label mr-3">ファイルの種類</label>
          <select id="type" class="form-select" v-model="currentType">
            <option v-for="(value, key) in types" v-text="value" :value="key"></option>
          </select>
        </div>

        <p class="alert alert-success text-center">それぞれのサムネイルの枠内をクリックするとURLがコピーされます。</p>

        <div class="d-flex flex-wrap justify-content-around">
          <div class="my-4 mx-2 p-3 border" v-for="medium in filteredMedia" :key="media.id"
            @click="copyToClipboard(medium)">
            <div>
              <img :src="medium.url" alt="No Image" style="max-height:200px;" v-if="medium.type=='image'">
              <video :src="medium.url" style="max-height:200px;" controls controlsList="nodownload"
                oncontextmenu="return false;" v-else-if="medium.type=='video'"></video>
            </div>
            <p v-text="medium.memo"></p>
          </div>
        </div>

        <div class="d-grid gap-2 mt-5 mb-3">
          <button class="btn btn-danger" @click="modalClose">閉じる</button>
        </div>
      </div>
    </div>

  </div>
@endsection

@section('js-script')
  <script>
    Vue.createApp({
      data() {
        return {
          media: [],
          types: {!! $media_types !!},
          uploadType: 1,
          uploadedFile: {},
          posterImg: '',
          previewImage: '',
          memo: '',
          currentType: 1,
        };
      },
      computed: {
        filteredMedia() {
          return this.media.filter((item) => item.type === this.types[parseInt(this.currentType)]);
        }
      },
      methods: {
        getList() {
          const url = '/editors/media/list';
          axios.get(url)
            .then(response => {
              this.media = response.data;
            });
        },
        modalOpen() {
          $('.js-modal').fadeIn();
        },
        modalClose() {
          $('.js-modal').fadeOut();
          this.currentType = 1;
        },
        copyToClipboard(medium) {
          const copyTarget = medium.url;
          const el = document.createElement('textarea');
          el.value = copyTarget;
          el.setAttribute('readonly', '');
          el.style = {
            position: 'absolute',
            left: '-9999px'
          };
          document.body.appendChild(el);
          el.select();
          document.execCommand('copy');
          document.body.removeChild(el);
          alert(`コピーできました！ : ${copyTarget}`);
        },
        onFileChange(e) {
          const file = e.target.files[0] || e.dataTransfer.files[0];
          if (parseInt(this.uploadType) === 1) {
            this.createImage(file);
            this.posterImg = '';
          }
          this.uploadedFile = file;
        },
        onPosterChange(e) {
          const file = e.target.files[0];
          this.posterImg = file;
          this.createImage(file);
        },
        createImage(file) {
          const reader = new FileReader();
          reader.onload = e => {
            this.previewImage = e.target.result;
          };
          reader.readAsDataURL(file);
        },
        clearPreview() {
          this.previewImage = '';
        },
        onUpload() {
          if (confirm('保存します。よろしいですか？')) {
            let formData = new FormData();
            formData.append('type', this.types[parseInt(this.uploadType)]);
            formData.append('memo', this.memo);
            formData.append('poster', this.posterImg);
            formData.append('medium', this.uploadedFile);

            const url = '/editors/media/upload';

            axios.post(url, formData)
              .then(response => {
                if (response.data.result) {
                  this.getList();
                  this.uploadType = 1;
                  this.memo = '';
                  this.posterImg = '';
                  this.previewImage = '';
                  alert('アップロード成功！');
                  this.$refs['image'].value = '';
                  this.$refs['poster'].value = '';
                }
              })
              .catch(error => {
                console.log(error);
              });
          }
        },
      },
      mounted() {
        this.getList();
      },
      setup() {
        return {
          image: Vue.ref(null),
          poster: Vue.ref(null),
        }
      }
    }).mount('#app');

  </script>
@endsection
