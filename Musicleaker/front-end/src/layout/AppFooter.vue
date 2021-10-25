<template>
  <footer class="footer has-cards">
    <div class="container">
      <hr />
      <div class="row align-items-center justify-content-md-between">
        <div class="col-md-6">
          <div class="copyright">
            &copy; {{ year }}
            <a
              href="http://localhost:8080/"
              target="_blank"
              rel="noopener"
              >MusicLeaker v2.0</a
            >
          </div>
        </div>
        <div class="col-md-6">
          <ul class="nav nav-footer justify-content-end">
            <li class="nav-item">
              <a
                href="http://localhost:8080/"
                class="nav-link"
                target="_blank"
                rel="noopener"
                >About Us</a
              >
            </li>
            <li class="nav-item">
              <a
                href="tel: +0385870810"
                class="nav-link"
                target="_blank"
                rel="noopener"
                >Liên hệ: +0385870810</a
              >
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
</template>
<script>
export default {
  name: "app-footer",
  data() {
    return {
      year: new Date().getFullYear()
    };
  }
};
</script>
<style></style>
 