<template>
  <footer class="footer has-cards">
    <div class="container">
      <hr />
      <div class="row align-items-center justify-content-md-between">
        <div class="col-md-6">
          <div class="copyright">
            &copy; {{ year }}
            <a
              href="https://fb.com/tx.trongnghia98"
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
                href="https://fb.com/tx.trongnghia98"
                class="nav-link"
                target="_blank"
                rel="noopener"
                >About Us</a
              >
            </li>
            <li class="nav-item">
              <a
                href="tel: +84886483147"
                class="nav-link"
                target="_blank"
                rel="noopener"
                >Liên hệ: +84 886 48 3147</a
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
