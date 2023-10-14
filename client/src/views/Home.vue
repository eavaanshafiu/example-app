<template>
    <v-card class="mx-auto" width="400" prepend-icon="mdi-home">
      <template v-slot:title>
        Students
      </template>
      <v-btn class="primary ml-5 bg-blue" @click="$refs.studentModal.open()">
        New Student
      </v-btn>

      <v-card-text>
          <v-table>
            <thead>
              <tr>
                <th class="text-left">
                  First Name
                </th>
                <th class="text-left">
                  Last Name
                </th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="item in items" :key="item.name">
                <td>{{ item.first_name }}</td>
                <td>{{ item.last_name }}</td>
              </tr>
            </tbody>
          </v-table>
       
      </v-card-text>
    </v-card>

    <StudentModal @reload="getItems()" ref="studentModal"></StudentModal>
</template>

<script >
import StudentModal from '@/components/StudentModal.vue';
import axios from 'axios';

export default {
    components: {StudentModal},
    data: () => ({
        items: []
    }),
    methods: {
        getItems() {
            axios({
                method: 'get',
                url: 'http://127.0.0.1:8000/api/students',
            }).then((resp) => {
                this.items = resp.data;
            });
        }
    },
    mounted() {
        this.getItems();
    },
    components: { StudentModal }
}
</script>
