<template>
  <div>
    <Loader v-if="isLoadingShow"></Loader>
    <section class="section section-shaped section-lg my-0">
      <div class="shape shape-style-1 bg-gradient-purple  custom-height">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </div>
      <!-- From đăng nhập -->
      <div class="container pt-lg-md" v-if="isLogin">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <card
              type="secondary"
              shadow
              header-classes="bg-white pb-5"
              body-classes="px-lg-5 py-lg-5"
              class="border-0"
            >
              <template>
                <div class="text-muted text-center mb-3 font-weight-bold">
                  ĐĂNG NHẬP
                </div>
              </template>
              <template>
                <div class="text-center text-muted mb-4">
                  <small>Tiến hành xác thực danh tính để tiếp tục</small>
                </div>
                <form role="form" v-on:keyup.enter="login()">
                  <base-input
                    alternative
                    class="mb-3"
                    placeholder="Tên tài khoản"
                    v-model="username"
                    addon-left-icon="fa fa-user"
                  ></base-input>
                  <base-input
                    alternative
                    type="password"
                    v-model="password"
                    placeholder="Mật khẩu"
                    addon-left-icon="ni ni-lock-circle-open"
                  ></base-input>
                  <div class="text-center">
                    <base-button
                      type="primary"
                      class="my-4"
                      v-on:click="login()"
                      >Đăng nhập</base-button
                    >
                  </div>
                </form>
              </template>
            </card>
            <div class="row mt-3">
              <div class="col-6">
                <a href="#" class="text-white">
                  <small>Quên mật khẩu?</small>
                </a>
              </div>
              <div class="col-6 text-right">
                <a
                  v-on:click="isLogin = false"
                  class="text-white"
                  style="cursor: pointer"
                >
                  <small>Tạo tài khoản mới</small>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Kết thúc form đăng nhập -->

      <!-- From đăng ký -->
      <div class="container pt-lg-md" v-if="!isLogin">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <card
              type="secondary"
              shadow
              header-classes="bg-white pb-5"
              body-classes="px-lg-5 py-lg-5"
              class="border-0"
            >
              <template>
                <div class="text-muted text-center mb-3">ĐĂNG KÝ</div>
              </template>
              <template>
                <div class="text-center text-muted mb-4">
                  <small>Tiến hành tạo tài khoản để tham gia dịch vụ</small>
                </div>
                <form role="form" v-on:keyup.enter="signUp()">
                  <base-input
                    alternative
                    class="mb-3"
                    placeholder="Tên đăng nhập"
                    v-model="register.username"
                    addon-left-icon="fa fa-user"
                  ></base-input>
                  <base-input
                    alternative
                    class="mb-3"
                    v-model="register.fullname"
                    placeholder="Họ và tên"
                    addon-left-icon="ni ni-hat-3"
                  ></base-input>
                  <base-input
                    alternative
                    class="mb-3"
                    v-model="register.email"
                    placeholder="Email"
                    addon-left-icon="ni ni-email-83"
                  ></base-input>
                  <base-input
                    alternative
                    type="password"
                    v-model="register.password"
                    placeholder="Mật khẩu"
                    addon-left-icon="ni ni-lock-circle-open"
                  ></base-input>
                  <base-input
                    alternative
                    type="password"
                    v-model="password2"
                    placeholder="Nhập lại mật khẩu"
                    addon-left-icon="ni ni-lock-circle-open"
                  ></base-input>
                  <div class="text-center">
                    <base-button type="primary" class="my-4" @click="signUp()"
                      >Tạo tài khoản</base-button
                    >
                  </div>
                </form>
              </template>
            </card>
            <div class="row mt-3">
              <div class="col-6"></div>
              <div class="col-6 text-right" style="cursor: pointer">
                <a v-on:click="isLogin = true" class="text-white">
                  <small>Đã có tài khoản?</small>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Kết thúc form đăn ký -->
    </section>
    <section class="section section-lg pt-lg-0 mt-5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12">
            <div class="row row-grid">
              <div class="col-lg-4" align="center">
                <card class="border-0" hover shadow body-classes="py-5">
                  <icon
                    name="fa fa-bolt"
                    type="primary"
                    rounded
                    class="mb-4"
                  ></icon>
                  <h6
                    class="text-primary text-uppercase text-center font-weight-bold"
                  >
                    KẾT NỐI NHANH CHÓNG
                  </h6>
                  <p class="description mt-3 mb-2 text-center">
                    Tìm kiếm âm nhạc chưa bao giờ nhanh chóng và dễ dàng như vậy
                    !
                  </p>
                  <div align="center">
                    <badge type="primary" rounded>Nhanh chóng</badge>
                    <badge type="primary" rounded>Thuận lợi</badge>
                    <badge type="primary" rounded>Dễ dàng</badge>
                  </div>
                </card>
              </div>
              <div class="col-lg-4" align="center">
                <card class="border-0" hover shadow body-classes="py-5">
                  <icon
                    name="fa fa-money"
                    type="success"
                    rounded
                    class="mb-4"
                  ></icon>
                  <h6
                    class="text-success text-uppercase text-center font-weight-bold"
                  >
                    HOÀN TOÀN MIỄN PHÍ
                  </h6>
                  <p class="description mt-3 mb-2 text-center">
                    Không lấy của bạn bất kỳ khoản phí nào khi sử dụng
                  </p>
                  <div align="center">
                    <badge type="success" rounded>Miễn phí</badge>
                    <badge type="success" rounded>An toàn</badge>
                    <badge type="success" rounded>Hiệu quả</badge>
                  </div>
                </card>
              </div>
              <!-- PICTURE 1 ====================================================================== -->
              <div class="col-lg-4" align="center">
                <card class="border-0" hover shadow body-classes="py-5">
                  <icon
                    name="fa fa-music"
                    type="warning"
                    rounded
                    class="mb-4"
                  ></icon>
                  <h6
                    class="text-warning text-uppercase text-center font-weight-bold"
                  >
                    TRẢI NGHIỆM TUYỆT VỜI
                  </h6>
                  <p class="description mt-3 mb-2 text-center">
                    Thế giới âm nhạc vô cùng rộng lớn thỏa sức trải nghiệm
                  </p>
                  <div align="center">
                    <badge type="warning" rounded>Rộng lớn</badge>
                    <badge type="warning" rounded>Tự do</badge>
                    <badge type="warning" rounded>Thỏa thích</badge>
                  </div>
                </card>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!--picture 1-->
    <section class="section section section-shaped my-0 overflow-hidden">
      <div class="shape shape-style-1 bg-gradient-warning shape-skew">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </div>
      <div class="container">
        <div class="row row-grid align-items-center">
          <div class="col-md-6 order-md-2">
            <img
              src="img/theme/michael.jpg"
              class="img-fluid floating rounded"
            />
          </div>
          <div class="col-md-6 order-md-1">
            <div class="pr-md-5">
              <h3 class="display-3 text-white">Tận hưởng thế giới âm nhạc</h3>
              <p class="text-white lead">
                Có thể nói âm nhạc là linh hồn của cuộc sống, là sức mạnh tinh
                thần làm xoa diệu mọi nỗi đau tâm hồn và nâng đỡ con người đứng
                dậy. ...
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- END PICTURE 1 ==================-->

    <!-- PICTURE 2 ===================================--->
    <section class="section bg-secondary">
      <div class="container">
        <div class="row row-grid align-items-center">
          <div class="col-md-6">
            <img
              src="img/theme/rock.jpg"
              class="img-fluid floating-sm rounded"
            />
          </div>
          <div class="col-md-6">
            <div class="pl-md-5">
              <h3>Thế giới âm nhạc phong phú</h3>
              <p class="lead">
                Tình yêu cho phép những ca khúc ra đời. Nỗi đau và niềm hân hoan
                làm thành bào thai sinh nở ra âm nhạc. Âm nhạc như thế là tình
                yêu, là trong bản thân nó hàm chứa một cõi nhân sinh bề bộn
                những đau khổ và hoan lạc.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- END PICTURE 2 ================================================-->

    <!-- PICTURE 3 ======================================================-->
    <section class="section section section-shaped my-0 overflow-hidden">
      <div class="shape shape-style-1 bg-gradient-danger shape-skew">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </div>
      <div class="container py-0">
        <div class="row row-grid align-items-center">
          <div class="col-md-6 order-lg-2 ml-lg-auto">
            <div class="position-relative pl-md-5">
              <img
                src="img/theme/close-up-of-a-person-writing-musical-notes-on-a-sheet-of-paper.jpg"
                class="img-center img-fluid  rounded"
              />
            </div>
          </div>
          <div class="col-lg-6 order-lg-1">
            <div class="d-flex px-3">
              <div></div>
              <div class="pl-4">
                <h3 class="display-5 text-white">
                  Cập nhật những sáng tác mới nhất
                </h3>
                <p class="text-white lead">
                  Âm nhạc chẳng là gì khác ngoài những âm thanh hoang dã được
                  văn minh hoá vào thời gian và giai điệu.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- END PICTURE 3 -->

    <section class="section section-lg">
      <div class="container">
        <div class="row justify-content-center text-center mb-lg">
          <div class="col-lg-8">
            <h2 class="display-3">Thành viên sáng lập</h2>
            <p class="lead text-muted">
              Chúng tôi là ai ?
            </p>
          </div>
        </div>
        <div class="row justify-content-center text-center">
          <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
            <div class="px-4">
              <img
                v-lazy="
                  'img/theme/57045397_2396567773906412_9002583388963471360_n.jpg'
                "
                class="rounded-circle img-center img-fluid shadow shadow-lg--hover"
                style="width: 200px;"
              />
              <div class="pt-4 text-center">
                <h5 class="title">
                  <span class="d-block mb-1">Nguyễn Trọng Nghĩa</span>
                  <small class="h6 text-muted">Back-end</small>
                </h5>
                <div class="mt-3">
                  <base-button
                    tag="a"
                    href="#"
                    type="warning"
                    icon="fa fa-twitter"
                    rounded
                    icon-only
                  ></base-button>
                  <base-button
                    tag="a"
                    href="https://www.facebook.com/tx.trongnghia98"
                    type="warning"
                    icon="fa fa-facebook"
                    rounded
                    icon-only
                  ></base-button>
                  <base-button
                    tag="a"
                    href="https://github.com/futureskyprojects"
                    type="warning"
                    icon="fa fa-github"
                    rounded
                    icon-only
                  ></base-button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
            <div class="px-4">
              <img
                v-lazy="
                  'img/theme/77268039_1735391823264311_8307585593739575296_n.jpg'
                "
                class="rounded-circle img-center img-fluid shadow shadow-lg--hover"
                style="width: 200px;"
              />
              <div class="pt-4 text-center">
                <h5 class="title">
                  <span class="d-block mb-1">Hoàng Thiên Phú</span>
                  <small class="h6 text-muted">Front-end</small>
                </h5>
                <div class="mt-3">
                  <base-button
                    tag="a"
                    href="https://twitter.com/PhuHoan73477827"
                    type="primary"
                    icon="fa fa-twitter"
                    rounded
                    icon-only
                  ></base-button>
                  <base-button
                    tag="a"
                    href="https://www.facebook.com/mrcariot"
                    type="primary"
                    icon="fa fa-facebook"
                    rounded
                    icon-only
                  ></base-button>
                  <base-button
                    tag="a"
                    href="https://github.com/mchoang98"
                    type="primary"
                    icon="fa fa-github"
                    rounded
                    icon-only
                  ></base-button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section section-shaped my-0 overflow-hidden">
      <div class="shape shape-style-3 bg-gradient-default shape-skew">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </div>
      <div class="container pt-lg pb-300">
        <div class="row text-center justify-content-center">
          <div class="col-lg-10">
            <h2 class="display-3 text-white">Góp ý phát triển</h2>
            <p class="lead text-white">
              Website phát triển trên tinh thần phi lợi nhuận nhằm đem lại hiệu
              quả cộng đồng, tuy vậy chúng tôi vẫn mong muốn có được những ý
              kiến đóng góp nhằm phát triển website vì vậy hãy để lại ý kiến
              đóng góp của bạn ngay dưới form email này !
            </p>
          </div>
        </div>
      </div>
    </section>
    <section class="section section-lg pt-lg-0 section-contact-us">
      <div class="container">
        <div class="row justify-content-center mt--300">
          <div class="col-lg-8">
            <card gradient="secondary" shadow body-classes="p-lg-5">
              <h4 class="mb-1">Ý kiến của bạn</h4>
              <p class="mt-0">Gửi chúng tôi ý kiến cần đóng góp !</p>
              <base-input
                class="mt-5"
                alternative
                placeholder="Tên bạn"
                addon-left-icon="ni ni-user-run"
              ></base-input>
              <base-input
                alternative
                placeholder="Địa chỉ Email"
                addon-left-icon="ni ni-email-83"
              ></base-input>
              <base-input class="mb-4">
                <textarea
                  class="form-control form-control-alternative"
                  name="name"
                  rows="4"
                  cols="80"
                  placeholder="Nhập tin nhắn..."
                ></textarea>
              </base-input>
              <base-button type="default" round block size="lg"
                >Gửi tin nhắn</base-button
              >
            </card>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>
<script>
import Loader from "../components/Loading.vue";
import { getUser, addUser, checkUsername } from "../api/User.js";
export default {
  components: {
    Loader
  },
  data() {
    return {
      isLoadingShow: false,
      isLogin: true,
      username: "",
      password: "",
      password2: "",
      register: {
        username: "",
        fullname: "",
        email: "",
        password: "",
        search_count: 0
      }
    };
  },
  methods: {
    signUp() {
      if (this.register.username.length < 5) {
        this.$Message["warning"]({
          background: true,
          content: "Tên đăng nhập không thể bé hơn 5 ký tự"
        });
      } else if (this.register.password.length < 8) {
        this.$Message["warning"]({
          background: true,
          content: "Mật khẩu tối thiểu là 8 ký tự"
        });
      } else if (this.password2 != this.register.password) {
        this.$Message["warning"]({
          background: true,
          content: "Mật khẩu nhập lại không khớp"
        });
      } else if (this.register.email.length < 10) {
        this.$Message["warning"]({
          background: true,
          content: "Email không hợp lệ"
        });
      } else {
        this.isLoadingShow = true;
        checkUsername(this.register.username)
          .then(ra => {
            if (ra.data === 0) {
              this.isLoadingShow = true;
              addUser(this.register)
                .then(r => {
                  if (r.data == 1) {
                    this.username = this.register.username;
                    this.password = this.register.password;
                    this.login();
                  } else {
                    this.$Message["error"]({
                      background: true,
                      content: "Đăng ký không thành công, vui lòng thử lại"
                    });
                  }
                })
                .catch(e => {
                  this.$Message["error"]({
                    background: true,
                    content: "Đăng ký không thành công, vui lòng thử lại"
                  });
                })
                .finally(() => {
                  // this.isLoadingShow = false;
                });
            } else {
              this.$Message["error"]({
                background: true,
                content: "Tên đăng nhập đã được sử dụng"
              });
            }
          })
          .catch(e2 => {
            this.$Message["error"]({
              background: true,
              content: "Đã xảy ra lỗi, vui lòng thử lại"
            });
          })
          .finally(() => {
            this.isLoadingShow = false;
          });
      }
    },
    login() {
      if (this.username.length < 5 || this.password < 8) {
        this.$Message["error"]({
          background: true,
          content: "Vui lòng nhập đầy đủ thông tin"
        });
      } else {
        this.isLoadingShow = true;
        getUser(this.username, this.password)
          .then(res => {
            if (res.data.id != undefined && res.data.id > 0) {
              var userObj = res.data;
              // Đăng nhập thành công, xử lý ở đây
              this.$Message["success"]({
                background: true,
                content: "Xin chào " + userObj.fullname + "!"
              });
              this.$session.start();
              this.$session.set("USER_INFO", userObj);
              this.$router.push("/profile");
            } else {
              this.$Message["error"]({
                background: true,
                content: "Đăng nhập thất bại, vui lòng thử lại " + r.data
              });
            }
          })
          .catch(e => {
            this.$Message["error"]({
              background: true,
              content: "Đăng nhập thất bại, vui lòng thử lại " + e.message
            });
          })
          .finally(() => {
            this.isLoadingShow = false;
            this.password = "";
          });
      }
    }
  }
};
</script>
<style>
.custom-height {
  height: 120% !important;
}
</style>
