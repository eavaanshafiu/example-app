<template>
    <v-dialog width="500" v-model="show">
        <v-card title="Student" class="pa-3">
            <v-text-field label="First Name"
            v-model="student.first_name"></v-text-field>

            <v-text-field label="Last Name"
            v-model="student.last_name"></v-text-field>

            <v-card-actions>
                <v-btn @click="close" color="red">Close</v-btn>
                <v-btn @click="save" v-if="!student.id" color="green">Save</v-btn>
                <v-btn @click="update" v-if="student.id" color="purple">Update</v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>

<script>
import axios from 'axios'

export default {
    data: () => ({
        show: false,
        student: {
            first_name: '',
            last_name: ''
        }
    }),
    methods: {
        save(){
            axios({
                method: 'post',
                url: 'http://127.0.0.1:8000/api/students',
                data: this.student
            }).then((resp) => {
                this.close()
            });

        },

        update(){
            axios({
                method: 'put',
                url: `http://127.0.0.1:8000/api/students/${this.student.id}`,
                data: this.student
            }).then((resp) => {
                this.close()
            });
        },

        deleteStudent(id){
            axios({
                method: 'delete',
                url: `http://127.0.0.1:8000/api/students/${id}`,
            }).then((resp) => {
                this.close()
            });
        },

        edit(id){
            axios({
                method: 'get',
                url: `http://127.0.0.1:8000/api/students/${id}`,
            }).then((resp) => {
                this.student = resp.data
                this.open()
            });
        },
        open() {
            this.show = true;
        },
        close() {
            this.$emit("reload")
             this.show = false;
        }
        
    }
}
</script>