<template>
  <div>
    <el-container>
      <el-table
        v-loading="loading"
        :data="rows"
        style="width: 100%"
        :default-sort="{ prop: 'name', order: 'ascending' }"
      >
        <el-table-column prop="name" label="Name" sortable> </el-table-column>
        <el-table-column prop="price" label="Price"> </el-table-column>
        <el-table-column prop="bedrooms" label="Bedrooms"> </el-table-column>
        <el-table-column prop="bathrooms" label="Bathrooms"> </el-table-column>
        <el-table-column prop="storeys" label="Storeys"> </el-table-column>
        <el-table-column prop="garages" label="Garages"> </el-table-column>
      </el-table>
    </el-container>
    <el-container>
      <el-form ref="form" :model="form" label-width="100px" style="width: 100%">
        <el-row>
          <el-col :span="8">
            <el-form-item label="Search by name">
              <el-input v-model="form.name" clearable></el-input>
            </el-form-item>
            <el-form-item label="Garages count">
              <el-slider
                :format-tooltip="formatTooltips"
                v-model="form.garages"
              ></el-slider>
            </el-form-item>
            <el-form-item label="Price range">
              <el-slider
                :format-tooltip="formatTooltips"
                v-model="form.price"
                :max="1000000"
                range
              ></el-slider>
            </el-form-item>
          </el-col>
          <el-col :span="8">
            <el-form-item label="Bedrooms count">
              <el-slider
                :format-tooltip="formatTooltips"
                v-model="form.bedrooms"
              ></el-slider>
            </el-form-item>
          </el-col>
          <el-col :span="8">
            <el-form-item label="Bathrooms count">
              <el-slider
                :format-tooltip="formatTooltips"
                v-model="form.bathrooms"
              ></el-slider>
            </el-form-item>
            <el-form-item label="Storeys count">
              <el-slider
                :format-tooltip="formatTooltips"
                v-model="form.storeys"
              ></el-slider>
            </el-form-item>

            <el-form-item>
              <el-button type="primary" @click="getFlats()">Find</el-button>
            </el-form-item>
          </el-col>
        </el-row>
      </el-form>
    </el-container>
  </div>
</template>

<script>
import getFlats from "./../services/FlatService";

export default {
  name: "TableComponent",
  mounted: function () {
    console.log("Mounted");
    this.getFlats(true);
  },
  data: function () {
    return {
      rows: [],
      loading: false,
      form: {
        name: "",
        bedrooms: 0,
        bathrooms: 0,
        garages: 0,
        storeys: 0,
        price: [0, 0],
      },
    };
  },
  methods: {
    formatTooltips(val) {
      return val ? val : "no filter";
    },
    async getFlats(getAll = false) {
      try {
        this.loading = true;
        this.rows = await getFlats(getAll ? null : this.form);
        this.loading = false;
      } catch (error) {
        this.loading = false;
        alert("Service error");
        console.log(error);
      }
    },
  },
};
</script>
