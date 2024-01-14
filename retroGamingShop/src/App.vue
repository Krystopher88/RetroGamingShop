<script>
const parentMessage = 'Parent'
const items = [{ message: 'Foo' }, { message: 'Bar' }]
</script>

<template>
<div id="app">
    <h1>Mon application</h1>
    <router-link to="/">Accueil</router-link>
    <router-link to="/about">A propos</router-link>
    <router-view></router-view>
  </div>
</template>