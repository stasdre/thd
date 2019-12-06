<template>
  <div>
    <div class="row">
      <div class="col-lg-6">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Block name" />
          <span class="input-group-btn">
            <button class="btn btn-success" v-on:click="updateName" type="button">Change name</button>
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
            <button type="button" class="btn btn-primary" v-on:click="addNewItem">Add new link</button>
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
export default {
  props: ["block-id"],
  data: function() {
    return {
      items: [],
      name: "",
      link: ""
    };
  },
  methods: {
    updateName: function() {
      console.log(this.blockId);
    },
    addNewItem: function() {
      this.items.push({
        id: 1,
        name: this.name,
        link: this.link
      });

      this.name = "";
      this.link = "";
    },
    removeItem: function(id) {
      this.items = this.items.filter(item => id !== item.id);
    }
  }
};
</script>