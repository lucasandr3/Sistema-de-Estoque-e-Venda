var rel1 = new Chart(document.getElementById("rel1"), {
  type: "bar",
  data: {
    labels: days_list,
    datasets: [
      {
        label: "Receitas",
        data: receitas,
        fill: false,
        backgroundColor: "#00a685",
        borderColor: "#00a685",
      },
      {
        label: "Despesas",
        data: despesas,
        fill: false,
        backgroundColor: "#d05748",
        borderColor: "#d05748",
      },
    ],
  },
});

var rel2 = new Chart(document.getElementById("rel2"), {
  type: "pie",
  data: {
    datasets: [
      {
        data: [
          moreSales[0].total,
          moreSales[1].total,
          moreSales[2].total,
          moreSales[3].total,
          moreSales[4].total,
        ],
        backgroundColor: [
          "#F7464A",
          "#46BFBD",
          "#FDB45C",
          "#3c8dbc",
          "#2e4158",
        ],
      },
    ],
    labels: [
      moreSales[0].nome_prod,
      moreSales[1].nome_prod,
      moreSales[2].nome_prod,
      moreSales[3].nome_prod,
      moreSales[4].nome_prod,
    ],
  },
});

let html = `
	<li style="font-size: 16px;text-transform: capitalize;padding: 10px 0;font-weight: 600;"><i class="fa fa-circle-o text-red"></i> ${moreSales[0].nome_prod}</li>
	<li style="font-size: 16px;text-transform: capitalize;padding: 10px 0;font-weight: 600;"><i class="fa fa-circle-o text-green"></i> ${moreSales[1].nome_prod}</li>
	<li style="font-size: 16px;text-transform: capitalize;padding: 10px 0;font-weight: 600;"><i class="fa fa-circle-o text-yellow"></i> ${moreSales[2].nome_prod}</li>
	<li style="font-size: 16px;text-transform: capitalize;padding: 10px 0;font-weight: 600;"><i class="fa fa-circle-o text-aqua"></i> ${moreSales[3].nome_prod}</li>
	<li style="font-size: 16px;text-transform: capitalize;padding: 10px 0;font-weight: 600;"><i class="fa fa-circle-o text-light-blue"></i> ${moreSales[4].nome_prod}</li>
	`;

document.querySelector("#chart-home-donut").innerHTML = html;

var donut = new Morris.Donut({
  element: "sales-chart",
  resize: true,
  colors: ["#3c8dbc", "#f56954", "#00a65a", "#f39c12", "#2e4158"],
  data: [
    { label: "Vendidos", value: moreSales[0].total },
    { label: "Vendidos", value: moreSales[1].total },
    { label: "Vendidos", value: moreSales[2].total },
    { label: "Vendidos", value: moreSales[3].total },
    { label: "Vendidos", value: moreSales[4].total },
  ],
  hideHover: "auto",
});
