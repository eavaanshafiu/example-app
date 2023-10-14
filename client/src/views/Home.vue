<template>
  <!-- <HelloWorld /> -->
  <p>{{ name }}</p>
  <p>{{ age }}</p>
  <!-- for loop to display array-->
  <p v-for="subject in subjects"> {{ subject }}</p>
  <p>{{ course.name }}</p>
  <p>{{ course.duration }}</p>
  <p>{{ course.yearStart }}</p>
  <v-btn @click="sayHello">
    Greet
  </v-btn>
  <v-btn @click="agePlus">
    {{ age }}
  </v-btn>
</template>

<script >
// import HelloWorld from '@/components/HelloWorld.vue'

export default {
  data: () => ({   //all varibales will be stored here
    name: "mohamed",
    age: 22,
    subjects: ['isam', 'maths', 'dhivehi'],
    course: {
      name: 'computer science',
      duration: "3 years",
      yearStart: "2022"
    },
  }),
  // mounted() {
  //   alert('Hello')
  // },
  methods: {
    sayHello() {
      alert('hello from methods')
    },
    agePlus() {
      this.age = this.age + 1;
    }
  }
}
</script>
