<style>
    @import url('https://fonts.googleapis.com/css2?family=Kantumruy+Pro:wght@500&display=swap');
    .notify-message{
      z-index: 10000000;
    }
    /*Khmer font*/
    @font-face{
      font-family: 'Hanuman', serif;
      src: url('https://fonts.googleapis.com/css2?family=Hanuman:wght@100&display=swap');
    }
    @font-face{
      font-family: 'Battambang', cursive;
      src: url('https://fonts.googleapis.com/css2?family=Battambang:wght@100&display=swap');
    }
    @font-face{
      font-family: 'Siemreap', cursive;
      src: url('https://fonts.googleapis.com/css2?family=Siemreap&display=swap'); 
    }
    @font-face{
      font-family: 'Moul', cursive;
      src: url('https://fonts.googleapis.com/css2?family=Moul&display=swap');
    }
    @font-face{
      font-family: 'Preahvihear', sans-serif;
      src: url('https://fonts.googleapis.com/css2?family=Preahvihear&display=swap');
    }
    @font-face{
      font-family: 'Koulen', cursive;
      src: url('https://fonts.googleapis.com/css2?family=Koulen&display=swap');
    }
    @font-face{
      font-family: 'Kantumruy Pro', sans-serif;
      src: url('https://fonts.googleapis.com/css2?family=Kantumruy+Pro:wght@100&display=swap');
    }
    .kantumruy{
      font-family: 'Kantumruy Pro', sans-serif;
    }
    /*English-font*/
    @font-face{
       font-family: 'Roboto', sans-serif;
      src: url('https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap');
    }
    @font-face{
      font-family: 'Open Sans', sans-serif;
      src: url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap');
    }
    @font-face{
      font-family: 'Ubuntu', sans-serif;
      src: url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap');
    }
    @font-face{
        font-family: 'Merriweather', serif;
      src: url('https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap');
    }
    @font-face{
     font-family: 'PT Sans', sans-serif;
      src: url('https://fonts.googleapis.com/css2?family=PT+Sans&display=swap');
    }


    .swal2-title{
      font-family: 'Kantumruy Pro', sans-serif;
     }
    .swal2-confirm{
      font-family: 'Kantumruy Pro', sans-serif;
      font-weight: 400;
    }
    .swal2-cancel {
      font-family: 'Kantumruy Pro', sans-serif;
      font-weight: 400;

    }
    /* font-size */

.font-size-10 {
    font-size: 10px;
}

.font-size-11 {
    font-size: 11px;
}

.font-size-12 {
    font-size: 12px;
}

.font-size-13 {
    font-size: 13px;
}

.font-size-14 {
    font-size: 14px;
}

.font-size-15 {
    font-size: 15px;
}

.font-size-16 {
    font-size: 16px;
}

.font-size-17 {
    font-size: 17px;
}

.font-size-18 {
    font-size: 18px;
}

.font-size-19 {
    font-size: 19px;
}

.font-size-20 {
    font-size: 20px;
}

.font-size-21 {
    font-size: 21px;
}

.font-size-22 {
    font-size: 22px;
}

.font-size-23 {
    font-size: 23px;
}

.font-size-24 {
    font-size: 24px;
}

.font-size-25 {
    font-size: 25px;
}

.font-size-28 {
    font-size: 28px;
}

.font-size-30 {
    font-size: 30px;
}

.font-size-35 {
    font-size: 35px;
}

.font-size-40 {
    font-size: 40px;
}
/*hover Animation*/
.hover-animation{
  transition: 0.5s ease-out;
}
.hover-animation-sub{
  position: absolute;
  left: 31px;
  transition: left 0.5s cubic-bezier(0.25, 0.1, 0.25, 1);
}
.hover-animation:hover .hover-animation-sub{
  text-decoration: underline;
  left: 40px;
}

/* Custom styles for the DataTable */
.dataTables_length,
.dataTables_filter {
  margin-bottom: 10px;
}
#newsTable {
  
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 10px;

}


#newsTable th,
#newsTable td {
  padding: 20px;
}

#newsTable thead th {
  
  background-color: #f2f2f2;
  font-weight: bold;
}

table.dataTable tbody tr{

  border-bottom: solid 1.5px #ededed;
}
#newsTable tbody tr:nth-child(even) {
  background-color: #f9f9f9;
}

#newsTable tbody tr:hover {
  background-color: #e6e6e6;
}

#newsTable tbody td a {
  color: #0066cc;
  text-decoration: none;
}

#newsTable tbody td a:hover {
  text-decoration: underline;
}

/*New Table1*/
#newsTable1 {
  
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 10px;

}


#newsTable1 th,
#newsTable1 td {
  padding: 20px;
}

#newsTable1 thead th {
  
  background-color: #f2f2f2;
  font-weight: bold;
}

table.dataTable tbody tr{

  border-bottom: solid 1.5px #ededed;
}
#newsTable1 tbody tr:nth-child(even) {
  background-color: #f9f9f9;
}

#newsTable1 tbody tr:hover {
  background-color: #e6e6e6;
}

#newsTable1 tbody td a {
  color: #0066cc;
  text-decoration: none;
}

#newsTable1 tbody td a:hover {
  text-decoration: underline;
}


/*New Table2*/
#newsTable2 {
  
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 10px;

}


#newsTable2 th,
#newsTable2 td {
  padding: 20px;
}

#newsTable2 thead th {
  
  background-color: #f2f2f2;
  font-weight: bold;
}

table.dataTable tbody tr{

  border-bottom: solid 1.5px #ededed;
}
#newsTable2 tbody tr:nth-child(even) {
  background-color: #f9f9f9;
}

#newsTable2 tbody tr:hover {
  background-color: #e6e6e6;
}

#newsTable2 tbody td a {
  color: #0066cc;
  text-decoration: none;
}

#newsTable2 tbody td a:hover {
  text-decoration: underline;
}

  </style>