<template>
  <div>
    <div class="row">
      <div class="col-lg-6">
        <div class="input-group">
          <input type="text" v-model="blockName" class="form-control" placeholder="Block name" />
          <span class="input-group-btn">
            <button
              class="btn btn-success"
              v-on:click="updateName"
              :disabled="isLoading"
              type="button"
            >
              <i v-if="isLoading" class="fa fa-spinner fa-spin"></i> Change name
            </button>
          </span>
        </div>
      </div>
    </div>
    <div class="row" style="margin-bottom: 40px;">
      <div class="col-lg-8">
        <h3>Add new item:</h3>
        <div class="row">
          <div class="col-md-4">
            <input
              v-model="name"
              type="text"
              class="form-control"
              id="exampleInputName2"
              placeholder="Name"
            />
          </div>
          <div class="col-md-5">
            <input
              v-model="link"
              type="text"
              class="form-control"
              id="exampleInputEmail2"
              placeholder="link"
            />
          </div>
          <div class="col-md-2">
            <button
              :disabled="isLoading"
              type="button"
              class="btn btn-primary"
              v-on:click="addNewItem"
            >
              <i v-if="isLoading" class="fa fa-spinner fa-spin"></i> Add new link
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-8">
        <div class="list-group">
          <div class="list-group-item" v-for="item in items" v-bind:key="item.id">
            <footer-block-item :item-info="item" v-on:remove-item="removeItem"></footer-block-item>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  props: ["block-id", "block-name", "items"],
  data: function() {
    return {
      name: "",
      link: "",
      isLoading: false
    };
  },
  methods: {
    updateName: function() {
      this.isLoading = true;
      axios
        .post(`/admin-dwhp/update-footer-block-name/${this.blockId}`, {
          name: this.blockName
        })
        .then(response => {
          this.isLoading = false;
        })
        .catch(error => {});
    },
    addNewItem: function() {
      this.isLoading = true;
      axios
        .post(`/admin-dwhp/footer-items`, {
          name: this.name,
          link: this.link,
          footer_block_id: this.blockId
        })
        .then(response => {
          this.isLoading = false;
          if (response.data.status === "ok") {
            this.items.push({
              id: response.data.data.id,
              name: response.data.data.name,
              link: response.data.data.link
            });
            this.name = "";
            this.link = "";
          }
        })
        .catch(error => {});
    },
    removeItem: function(id) {
      this.items = this.items.filter(item => id !== item.id);
    }
  }
};
</script>