<template>
    <button class="load-button button-pink">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="18" height="20" style="" xml:space="preserve"><rect id="backgroundrect" width="100%" height="100%" x="0" y="0" fill="none" stroke="none"/>
                <g class="currentLayer" style=""><title>Layer 1</title><rect x="0" y="0" width="4" height="20" fill="#fff" id="svg_1" class="">
                  <animate attributeName="opacity" attributeType="XML" values="1; .2; 1" begin="0s" dur="0.6s" repeatCount="indefinite"/>
                </rect><rect x="7" y="0" width="4" height="20" fill="#fff" id="svg_2" class="">
                  <animate attributeName="opacity" attributeType="XML" values="1; .2; 1" begin="0.2s" dur="0.6s" repeatCount="indefinite"/>
                </rect><rect x="14" y="0" width="4" height="20" fill="#fff" id="svg_3" class="">
                  <animate attributeName="opacity" attributeType="XML" values="1; .2; 1" begin="0.4s" dur="0.6s" repeatCount="indefinite"/>
                </rect></g>
              </svg>
    </button>
</template>
<script>
export default {
  name: "load-button"
};
</script>
<style lang="scss">
button.load-button {
  padding: 1rem 2.75rem 0.7rem 2.75rem !important;
  svg {
    margin: 0 auto;
  }
}
</style>


