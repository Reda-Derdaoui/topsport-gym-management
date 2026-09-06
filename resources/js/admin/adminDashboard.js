import Chart from "chart.js/auto";

const dataElement = document.getElementById("admin-dashboard-chart-data");

if (dataElement) {
    const chartData = JSON.parse(dataElement.textContent);

    const createBarChart = (canvasId, dataset, color, unit) => {
        const canvas = document.getElementById(canvasId);

        if (!canvas || !dataset.labels.length) {
            return;
        }

        new Chart(canvas, {
            type: "bar",
            data: {
                labels: dataset.labels,
                datasets: [
                    {
                        data: dataset.values,
                        backgroundColor: color,
                        borderColor: color,
                        borderWidth: 1,
                        borderRadius: 5,
                        maxBarThickness: 48,
                    },
                ],
            },
            options: {
                maintainAspectRatio: false,
                responsive: true,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            label: (context) => `${context.parsed.y} ${unit}`,
                        },
                    },
                },
                scales: {
                    x: {
                        grid: { display: false },
                        ticks: { color: "#A1A1AA" },
                    },
                    y: {
                        beginAtZero: true,
                        grid: { color: "rgba(161, 161, 170, 0.15)" },
                        ticks: { color: "#A1A1AA" },
                    },
                },
            },
        });
    };

    createBarChart("revenue-by-month-chart", chartData.revenueByMonth, "#3B82F6", "DH");
    createBarChart("revenue-by-activity-chart", chartData.revenueByActivity, "#10B981", "DH");
    createBarChart("adherents-by-activity-chart", chartData.adherentsByActivity, "#F59E0B", "adherents");
}
