<template>
  <div class="overlay">
    <div class="lds-ripple">
      <div></div>
      <div></div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Loader"
};
</script>

<style>
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
