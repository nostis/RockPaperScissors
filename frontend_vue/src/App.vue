<template>
  <div id="app">
    <rock-paper-scissors/>
  </div>
</template>

<script>
import RockPaperScissors from './components/RockPaperScissors.vue'

export default {
  name: 'app',
  components: {
    RockPaperScissors,
  }
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
