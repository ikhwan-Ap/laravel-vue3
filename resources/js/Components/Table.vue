<template>
  <tableComponents>
    <table class="table-fixed" id="table-components">
      <thead>
        <!-- Seting By Params Data Head  -->
        <tr>
          <th>Song</th>
          <th>Artist</th>
          <th>Year</th>
        </tr>
        <!-- End Of This have a action  -->
      </thead>
      <tbody>
        <!-- Setting For The include of name  -->
        <tr>
          <td>The Sliding Mr. Bones (Next Stop, Pottersville)</td>
          <td>Malcolm Lockyer</td>
          <td>1961</td>
        </tr>
        <tr>
          <td>Witchy Woman</td>
          <td>The Eagles</td>
          <td>1972</td>
        </tr>
        <tr>
          <td>Shining Star</td>
          <td>Earth, Wind, and Fire</td>
          <td>1975</td>
        </tr>
        <!-- A Action gift return from params and ziggy -->
      </tbody>
    </table>
  </tableComponents>
</template>

<script>
  import { computed } from 'vue';
  import { Link } from '@inertiajs/vue3';
  // const props = defineProps({
  //     dataUri : '',
  //     detailUri : '',
  //     viewUri : '',
  //     deleteUri : '',
  //     addUri : '',
  //     editUri : '',
  //     filterData:'',
  // });

  // const getData = () => {
  //     form.post(route(this.dataUri), {
  //         onFinish: () => this.setData(),
  //     });
  // };
  
  // const setData = () => {
  //   console.log('ea');
  // };

  // const mounted = mounted( () =>
  //     this.getData();
  // );
  export default {
      props: {
        dataUri : '',
        detailUri : '',
        viewUri : '',
        deleteUri : '',
        addUri : '',
        editUri : '',
        filterData:'',

      },
      data() {
        return {
          filter_data : [],
          query:[],
          // data For table
        }
      },

      mounted() {
        this.getData();
        // console.log(`The initial count is ${this.count}.`)
      },

      
      computed : {

      },

      methods: {
        getData() {
          
        },
        setData() {

        },
        increment() {
          this.count++
        }
      },
    
    }
</script>
