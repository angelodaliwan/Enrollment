
<template>
    <div class="row">
        <div class="col-md-6">
            <search-users-component/>
        </div>
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">Users List</div>
                <div class="panel-body">
                    <div v-if="!show_create && !show_edit">
                        <button class="btn btn-primary btn-sm" @click="showCreate">Create New User</button>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="user in users">
                                <td>{{ user.name}}</td>
                                <td>{{ user.email }}</td>
                                <td><button class="btn btn-warning btn-sm" @click="showEdit(user)">Edit</button></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div v-if="show_create">
                <create-user-component @add="added" @createcanceled="cancel_Create"/>
            </div>
            <div v-if="show_edit">
                <edit-user-component :data="(this.edit_details)" @updated="update" @editcanceled="cancel_Edit"/>
            </div>
        </div>
    </div>
</template>

<script>
    import SearchUsersComponent from '../components/SearchUsersComponent';
    import CreateUserComponent from '../components/CreateUserComponent.vue';
    import EditUserComponent from '../components/EditUserComponent'

    export default {
        components: {
            EditUserComponent,
            CreateUserComponent,
            SearchUsersComponent
        },

        props: ['data'],

        data() {
            return {
              users: this.data,
              show_create: false,
              show_edit: false,
              this_details: null,
              edit_details: null,

              params: {
                name : null,
                email : null,
              }
            }
        },

        methods: {
            showCreate(){
                this.show_create = true;
            },

	        cancel_Edit(){
		        this.show_edit = false;
	        },
	        cancel_Create(){
		        this.show_create = false;
	        },

            added(user){
                this.data.push(user);
                this.show_create = false;
            },

            showEdit(user){
                this.edit_details = user;
                this.show_edit = true;
            },

            update(user_details){
                this.data.push(user_details);
                this.show_edit = false;
            },

        }
    }
</script>

<style scoped>

</style>