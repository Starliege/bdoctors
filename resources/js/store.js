import Vue from 'vue'
const state = Vue.observable({
  // array dove salvi tutti i dottori
  doctors : [],
  // array dovei salvi i medici gia' filtrati 
  filteredDocs: [],

  filterText: ""
  
})

export default state