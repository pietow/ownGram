<template>
  <div>
    <button class="btn btn-primary ml-4" @click="handleClick">Follow</button>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("Component mounted.");
  },

  methods: {
    handleClick: function() {
      axios.post("/follow/1").then(response => {
        alert(response.data);
      });
    }
  }
};
</script>
