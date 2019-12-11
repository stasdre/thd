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
      <div class="col-md-4">
        <input
          v-model="itemInfo.link"
          type="text"
          class="form-control"
          id="exampleInputEmail2"
          placeholder="link"
        />
      </div>
      <div class="col-md-4">
        <div class="btn-group" role="group" aria-label="...">
          <button
            :disabled="isLoading"
            v-on:click="updateItem(itemInfo.id)"
            type="button"
            class="btn btn-info"
          >
            <i v-if="isLoading" class="fa fa-spinner fa-spin"></i> Update
          </button>
          <button
            :disabled="isLoading"
            v-on:click="removeItem(itemInfo.id)"
            type="button"
            class="btn btn-danger"
          >
            <i v-if="isLoading" class="fa fa-spinner fa-spin"></i> Remove
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  props: ["item-info"],
  data: function() {
    return {
      isLoading: false
    };
  },
  methods: {
    removeItem(id) {
      this.isLoading = true;
      axios
        .delete(`/admin-dwhp/footer-items/${id}`)
        .then(response => {
          if (response.data.status === "ok") {
            this.isLoading = false;
            this.$emit("remove-item", id);
          }
        })
        .catch(error => {});
    },
    updateItem(id) {
      this.isLoading = true;
      axios
        .patch(`/admin-dwhp/footer-items/${id}`, {
          name: this.itemInfo.name,
          link: this.itemInfo.link
        })
        .then(response => {
          if (response.data.status === "ok") {
            this.isLoading = false;
          }
        })
        .catch(error => {});
    }
  }
};
</script>