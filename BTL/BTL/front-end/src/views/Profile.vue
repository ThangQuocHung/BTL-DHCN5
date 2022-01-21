<template>
  <div>
    <div class="profile-page">
      <section class="section-profile-cover section-shaped my-0">
        <div class="shape shape-style-1 shape-primary shape-skew alpha-4">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </div>
        <div class="container my-custom">
          <base-input
            class="custom-input"
            alternative
            type="text"
            v-on:keyup.enter="searchSong()"
            v-model="searchObj.song"
            placeholder="Nhập tên bài hát..."
          />
          <base-button type="info" @click="searchSong()">Tìm kiếm</base-button>
        </div>
      </section>
      <section class="section section-skew">
        <div class="container">
          <card shadow class="card-profile mt--300" no-body>
            <div class="px-4">
              <div class="row justify-content-center">
                <div class="col-lg-3 order-lg-2">
                  <div class="card-profile-image">
                    <img v-lazy="avatar_url" class="rounded-circle" />
                  </div>
                </div>
                <div
                  class="col-lg-4 order-lg-3 text-lg-right align-self-lg-center"
                >
                  <div class="card-profile-actions py-4 mt-lg-0">
                    <!-- <base-button type="info" size="sm" class="mr-4"
                      >Chỉnh sửa</base-button
                    > -->
                    <base-button
                      type="danger"
                      size="sm"
                      class="float-right"
                      @click="logout()"
                      >Đăng xuất</base-button
                    >
                  </div>
                </div>
                <div class="col-lg-4 order-lg-1">
                  <div class="card-profile-stats d-flex justify-content-left">
                    <!-- <div>
                      <span class="heading">{{ count_user_song }}</span>
                      <span class="description">Bài hát</span>
                    </div> -->
                    <div>
                      <span class="heading">{{ user.search_count }}</span>
                      <span class="description">Lân tìm kiếm</span>
                    </div>
                    <div>
                      <span class="heading">{{ saved_songs.length }}</span>
                      <span class="description">Đã lưu</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center mt-5">
                <h3>
                  {{ user.fullname }}
                </h3>
                <div class="h6 font-weight-300">
                  {{ user.email }}
                </div>
                <div class="h6 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>Dưới đây là bảng
                  danh sách các bài hát mà bạn đã lưu lại
                </div>
              </div>
              <div class="mt-5 py-5 border-top text-center">
                <div class="row justify-content-center">
                  <div class="col-6" v-if="saved_songs.length == 0">
                    Hiện tại bạn chưa lưu bất cứ bài hát nào
                  </div>
                  <div class="col-12" v-if="saved_songs.length != 0">
                    <Table border :columns="col_header" :data="saved_songs">
                      <template slot-scope="{ row }" slot="name">
                        <strong>{{ row.name }}</strong>
                      </template>
                      <template slot-scope="{ row, index }" slot="song_id">
                        {{ index + 1 }}
                      </template>
                      <template slot-scope="{ row }" slot="song_avatar">
                        <img
                          class="rounded-circle img-center img-fluid shadow shadow-lg--hover"
                          :data-src="row.avatar"
                          :src="row.avatar"
                          lazy="loaded"
                          style="width: 80px; height: 80px; margin: 15px;"
                        />
                      </template>
                      <template slot-scope="{ row }" slot="action">
                        <Button
                          :type="
                            playAudio.mp3 == row.mp3 ? 'warning' : 'primary'
                          "
                          style="width: 120px; margin-bottom: 10px;"
                          @click="
                            playAudio.mp3 == row.mp3
                              ? stopSong()
                              : playSong(row)
                          "
                          >{{
                            playAudio.mp3 == row.mp3 ? "Ngừng nghe" : "Nghe thử"
                          }}</Button
                        >
                        <br />
                        <a
                          type="error"
                          style="width: 120px"
                          :href="row.mp3"
                          class="ivu-btn ivu-btn-error"
                          >Tải về</a
                        >
                      </template>
                    </Table>
                  </div>
                </div>
              </div>
            </div>
          </card>
        </div>
      </section>
      <!-- Hộp thoại tìm kiếm -->
      <section>
        <modal
          :show.sync="searchObj.isShowResult"
          :showClose="false"
          :modalClasses="'modal-dialog-scrollable'"
          class="custom-search-modal"
        >
          <template slot="header">
            <h5 class="modal-title">
              Một số kết quả tìm kiếm cho từ khóa "{{ searchObj.song }}"
            </h5>
          </template>
          <div>
            <div v-if="search_result_songs.length == 0">
              <div class="lds-ripple" style="margin-top: 50px;">
                <div></div>
                <div></div>
              </div>
              <p align="center" style="margin-top: -50px; margin-bottom: 0px">
                Đang tải
              </p>
            </div>
            <div class="col-12" v-if="search_result_songs.length != 0">
              <Table border :columns="col_header" :data="search_result_songs">
                <template slot-scope="{ row }" slot="name">
                  <strong>{{ row.name }}</strong>
                </template>
                <template slot-scope="{ row, index }" slot="song_id">
                  {{ index + 1 }}
                </template>
                <template slot-scope="{ row }" slot="song_avatar">
                  <img
                    class="rounded-circle img-center img-fluid shadow shadow-lg--hover"
                    :data-src="row.avatar"
                    :src="row.avatar"
                    lazy="loaded"
                    style="width: 80px; height: 80px; margin: 15px;"
                  />
                </template>
                <template slot-scope="{ row }" slot="action">
                  <Button
                    :type="
                      searchObj.playAudio.mp3 == row.mp3 ? 'warning' : 'primary'
                    "
                    style="width: 120px; margin-bottom: 10px;"
                    @click="
                      searchObj.playAudio.mp3 == row.mp3
                        ? stopSong()
                        : playSearchSong(row)
                    "
                    >{{
                      searchObj.playAudio.mp3 == row.mp3
                        ? "Ngừng nghe"
                        : "Nghe thử"
                    }}</Button
                  >
                  <br />
                  <a
                    type="error"
                    style="width: 120px"
                    :href="row.mp3"
                    class="ivu-btn ivu-btn-error"
                    @click="searchDownload(row)"
                    >Tải về</a
                  >
                </template>
              </Table>
            </div>
          </div>
          <template slot="footer">
            <base-button
              type="danger"
              @click="closeSearch()"
              class="mr-auto ml-auto"
              >ĐÓNG</base-button
            >
          </template>
        </modal>
      </section>
      <!-- Kết thúc tìm kiếm -->
    </div>
  </div>
</template>
<script>
import Modal from "../components/Modal.vue";
import { getAvatar, getCountUserSong, updateSearchCount } from "../api/User.js";
import { findSong, getSongInfo, addSong, getUserSong } from "../api/Song.js";
export default {
  components: {
    Modal
  },
  data() {
    return {
      avatar_url: "img/theme/team-4-800x800.jpg",
      user: this.$session.get("USER_INFO"),
      count_user_song: 0,
      searchObj: {
        isShowResult: false,
        song: "",
        playAudio: {
          audio: null,
          mp3: "."
        }
      },
      playAudio: {
        audio: null,
        mp3: "."
      },
      col_header: [
        {
          title: "ID",
          slot: "song_id",
          align: "center",
          width: 80
        },
        {
          title: "Biểu trưng",
          slot: "song_avatar",
          align: "center",
          width: 150
        },
        {
          title: "Bài hát",
          slot: "name",
          align: "center"
        },
        {
          title: "Ca sỹ",
          key: "singer",
          align: "center"
        },
        {
          title: "Tùy chọn",
          slot: "action",
          width: 180,
          align: "center"
        }
      ],
      saved_songs: [],
      search_result_songs: []
    };
  },
  methods: {
    logout() {
      this.$session.destroy();
      this.$router.push("/");
    },
    searchDownload(data) {
      var found = false;
      for (var i = 0; i < this.saved_songs.length; i++) {
        if (this.saved_songs[i] == data) {
          found = true;
          break;
        }
      }
      if (found == false) {
        addSong(this.user.id, data.key).then(r => {
          if (r.data != -1 && r.data > 0) {
            this.saved_songs.push(data);
          }
        });
      }
    },
    closeSearch() {
      this.searchObj.isShowResult = false;
      this.stopSong();
    },
    stopSong() {
      if (this.searchObj.playAudio.audio != null) {
        this.searchObj.playAudio.audio.pause();
        this.searchObj.playAudio.audio.currentTime = 0;
        this.searchObj.playAudio.mp3 = ".";
      }
      if (this.playAudio.audio != null) {
        this.playAudio.audio.pause();
        this.playAudio.audio.currentTime = 0;
        this.playAudio.mp3 = ".";
      }
    },
    playSong(data) {
      try {
        this.stopSong();
        this.playAudio = {
          audio: new Audio(data.mp3),
          mp3: data.mp3
        };
        this.playAudio.audio.play();
      } catch (e) {
        this.$Message["error"]({
          background: true,
          content: "Xin lỗi! Không thể phát bài hát này."
        });
      }
    },
    playSearchSong(data) {
      try {
        this.stopSong();
        this.searchObj.playAudio = {
          audio: new Audio(data.mp3),
          mp3: data.mp3
        };
        this.searchObj.playAudio.audio.play();
      } catch (e) {
        this.$Message["error"]({
          background: true,
          content: "Xin lỗi! Không thể phát bài hát này."
        });
      }
    },
    searchSong() {
      if (this.searchObj.song.length <= 0) {
        this.$Message["error"]({
          background: true,
          content: "Vui lòng nhập tên bài hát để tìm kiếm"
        });
      } else {
        this.search_result_songs = [];
        this.searchObj.isShowResult = true;
        findSong(this.searchObj.song)
          .then(r => {
            if (r.data != -1) {
              this.updateCountOfSearch();
              r.data.forEach(key => {
                getSongInfo(key).then(r => {
                  if (r.data.type === "song") {
                    var tempObj = {
                      name: r.data.track.title.replace(/^\s+|\s+$/g, ""),
                      avatar: r.data.track.avatar.replace(/^\s+|\s+$/g, ""),
                      singer: r.data.track.creator.replace(/^\s+|\s+$/g, ""),
                      mp3: r.data.track.location.replace(/^\s+|\s+$/g, ""),
                      key: key
                    };
                    this.search_result_songs.push(tempObj);
                  }
                });
              });
            } else {
              this.$Message["error"]({
                background: true,
                content:
                  "Tìm kiếm bài hát '" +
                  this.searchObj.song +
                  "' không thành công!"
              });
            }
          })
          .catch(e => {
            this.$Message["error"]({
              background: true,
              content:
                "Đã có lỗi xảy ra trong quá trình tìm kiếm, vui lòng thử lại."
            });
          })
          .finally(() => {});
      }
    },
    countUserSong(username) {
      getCountUserSong()
        .then(r => {
          if (r.data != 0) this.count_user_song = r.data;
          else this.count_user_song = 0;
        })
        .catch(e => {
          this.count_user_song = 0;
        });
    },
    updateCountOfSearch() {
      updateSearchCount(this.user.id).then(r => {
        if (r.data == 1) {
          this.user.search_count++;
          this.$session.set("USER_INFO", this.user);
        }
      });
    }
  },
  mounted() {
    getAvatar(this.user.email)
      .then(r => {
        if (r.data != "" && r.data != -1) {
          this.avatar_url = r.data;
        }
      })
      .catch(e => {
        this.avatar_url = "img/theme/team-4-800x800.jpg";
      });
    getUserSong(this.user.id).then(r => {
      if (r.data != -1) {
        r.data.forEach(res => {
          getSongInfo(res.song_key).then(r => {
            if (r.data.type === "song") {
              var tempObj = {
                name: r.data.track.title.replace(/^\s+|\s+$/g, ""),
                avatar: r.data.track.avatar.replace(/^\s+|\s+$/g, ""),
                singer: r.data.track.creator.replace(/^\s+|\s+$/g, ""),
                mp3: r.data.track.location.replace(/^\s+|\s+$/g, "")
              };
              this.saved_songs.push(tempObj);
            }
          });
        });
      }
    });
  }
};
</script>
<style>
.my-custom {
  position: absolute !important;
  margin-top: 120px;
  left: 50%;
  transform: translate(-50%, 0);
  text-align: center;
}

.custom-input .form-control {
  border-radius: 500px !important;
}

@media (min-width: 576px) {
  .custom-search-modal .modal-dialog {
    max-width: 100% !important;
    min-width: 100%;
    margin: 0;
  }
  .custom-search-modal .modal-content {
    min-height: 100vh !important;
  }
}

.modal {
  display: block !important; /* I added this to see the modal, you don't need this */
}

/* Important part */
.modal-dialog {
  overflow-y: initial !important;
}
.modal-body {
  height: 250px;
  overflow-y: auto;
}
.ivu-message {
  z-index: 9999 !important;
}
.overlay {
  position: absolute;
  z-index: 10000;
  display: block;
  width: 100%;
  height: 100%;
  background: #7c797931;
}
.lds-ripple {
  top: 50%;
  left: 50%;
  display: inline-block;
  position: relative;
  width: 80px;
  height: 80px;
  transform: translate(-50%, -50%);
}
.lds-ripple div {
  position: absolute;
  border: 4px solid rgb(25, 207, 231);
  opacity: 1;
  border-radius: 50%;
  animation: lds-ripple 1s cubic-bezier(0, 0.2, 0.8, 1) infinite;
}
.lds-ripple div:nth-child(2) {
  animation-delay: -0.5s;
}
@keyframes lds-ripple {
  0% {
    top: 36px;
    left: 36px;
    width: 0;
    height: 0;
    opacity: 1;
  }
  100% {
    top: 0px;
    left: 0px;
    width: 72px;
    height: 72px;
    opacity: 0;
  }
}
</style>
