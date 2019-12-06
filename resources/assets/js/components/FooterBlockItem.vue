<template>
  <div>
    <div class="row">
      <div class="col-md-4">
        <input
          v-model="itemInfo.name"
          type="text"
          class="form-control"
          id="exampleInputName2"
          placeholder="Name"
        />
      </div>
      <div class="col-md-5">
        <input
          v-model="itemInfo.link"
          type="text"
          class="form-control"
          id="exampleInputEmail2"
          placeholder="link"
        />
      </div>
      <div class="col-md-3">
        <div class="btn-group" role="group" aria-label="...">
          <button type="button" class="btn btn-info">Update</button>
          <button v-on:click="removeItem(itemInfo.id)" type="button" class="btn btn-danger">Remove</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["item-info"],
  data: function() {
    return {};
  },
  methods: {
    removeItem(id) {
      this.$emit("remove-item", id);
    }
  }
};
</script>