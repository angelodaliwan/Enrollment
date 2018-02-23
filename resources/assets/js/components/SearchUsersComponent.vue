<template>
    <div class="panel panel-primary">
        <div class="panel-heading">Search Users</div>
        <div class="panel-body">
            <div class="form-group">
                <div>
                    <label for="name">Name</label>
                    <input id="name" v-model="params.name" class="form-control">
                </div>
                <div>
                    <label for="email">Email</label>
                    <input id="email" v-model="params.email" class="form-control">
                </div>
            </div>
            <button class="btn btn-primary btn-sm" @click="Filter">Filter</button>
        </div>
    </div>
</template>

<script>
  export default {
    name: 'search-users-component',

    data() {
      return {
        params: {
          name: null,
          email: null,
        }
      }
    },

    methods: {
      Filter(){
        let url = `/users/filters`;

        let details = {
          name: this.params.name,
          email: this.params.email,
        }

        axios.post(url, details)
        .then(({data}) => {
          console.log(data);
          this.$emit('detail', data);
        })
      }
    }
  }
</script>
