<template>
  <div id="app">
    <component v-bind:is="currentComp" ref={currentComp}></component>
  </div>
</template>

<script>
import MainComp from './components/MainComp.vue'
import Scoreboard from './components/Scoreboard.vue'

export default {
  name: 'app',
  
  data() {
    return {
      currentComp : 'main-comp',
    }
  },

  components: {
    'main-comp' : MainComp,
    'scoreboard' : Scoreboard,
  },

  methods: {
    swapComponent(comp) {
      this.currentComp = comp
    }
  },


}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>