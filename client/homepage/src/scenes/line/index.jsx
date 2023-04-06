import { Box } from "@mui/material";
import Header from "../../components/Header";
import LineChart from "../../components/LineChart";

const Line = () => {
  return (
    <div className="row">
    <div className="col-xs-4 col-sm-12 col-md-12 ">
      <Box m="20px">
        <Header title="Line Chart" subtitle="Simple Line Chart" />
        <Box height="75vh">
          <LineChart />
        </Box>
      </Box>
    </div>
    </div>
  );
};

export default Line;