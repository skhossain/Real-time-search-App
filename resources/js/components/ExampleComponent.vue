<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <form>
              <div class="input-group mb-3">
                <input
                  type="text"
                  class="form-control"
                  placeholder="Search"
                  v-model="seatch_input"
                  aria-describedby="basic-addon2"
                />
                <div class="input-group-append">
                  <button type="submit" class="input-group-text" id="basic-addon2">Search</button>
                </div>
              </div>
            </form>
            <div :style="resultDiv">
              <ul>
                <li v-for="search_result in search_results" :key="search_result.id">
                  <a href>{{search_result.title}}</a>
                </li>
              </ul>
              <span v-if="!search_results.length" style="color:red;font-size:18px">Result not fund!</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      seatch_input: "",
      search_results: "",
      resultDiv: {
        display: "none"
      }
    };
  },
  methods: {
    getdata(val) {
        var app=this;
      axios
        .get("/search/"+val)
        .then(function(response) {
          app.search_results=response.data;
        });
    }
  },
  watch: {
    seatch_input: function(val) {
        this.getdata(val);
        if(!this.seatch_input){
            this.resultDiv.display="none";
        }else{
           this.resultDiv.display="block"; 
        }
    }
  }
};
</script>
