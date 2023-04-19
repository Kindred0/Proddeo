import { useState } from "react";
import { ProSidebarProvider, Menu, MenuItem , SubMenu } from "react-pro-sidebar";
// import { Sidebar as ProSidebar, useProSidebar } from 'react-pro-sidebar'; 
import { Box, IconButton, Typography, useTheme } from "@mui/material";
// import "react-pro-sidebar/dist/css/styles.css";
import { Link } from 'react-router-dom';
import { tokens } from "../../Theme";
import SchemaIcon from '@mui/icons-material/Schema';
import HomeOutlinedIcon from "@mui/icons-material/HomeOutlined";
import AccountTreeIcon from '@mui/icons-material/AccountTree';
import PeopleOutlinedIcon from "@mui/icons-material/PeopleOutlined";
import ContactsOutlinedIcon from "@mui/icons-material/ContactsOutlined";
import ReceiptOutlinedIcon from "@mui/icons-material/ReceiptOutlined";
import PersonOutlinedIcon from "@mui/icons-material/PersonOutlined";
import CalendarTodayOutlinedIcon from "@mui/icons-material/CalendarTodayOutlined";
import HelpOutlineOutlinedIcon from "@mui/icons-material/HelpOutlineOutlined";
import BarChartOutlinedIcon from "@mui/icons-material/BarChartOutlined";
import PieChartOutlineOutlinedIcon from "@mui/icons-material/PieChartOutlineOutlined";
import TimelineOutlinedIcon from "@mui/icons-material/TimelineOutlined";
import MenuOutlinedIcon from "@mui/icons-material/MenuOutlined";
import MapOutlinedIcon from "@mui/icons-material/MapOutlined";


const Item = ({ title, to, icon, selected, setSelected }) => {
  const theme = useTheme();
  const colors = tokens(theme.palette.mode);
  return (
    <MenuItem
      active={selected === title}
      style={{
        color: colors.grey[100],
      }}
      onClick={() => setSelected(title)}
      icon={icon}
    >
      <Typography>{title}</Typography>
      <Link to={to} />
    </MenuItem>
  );
};

const Sidebar = () => {
  const theme = useTheme();
  const colors = tokens(theme.palette.mode);
  const [isCollapsed, setIsCollapsed] = useState(false);
  const [selected, setSelected] = useState("Dashboard");

  return (
    <Box
      sx={{
        "& .pro-sidebar-inner": {
          background: `${colors.primary[400]} !important`,
        },
        "& .pro-icon-wrapper": {
          backgroundColor: "transparent !important",
        },
        "& .pro-inner-item": {
          padding: "5px 35px 5px 20px !important",
        },
        "& .pro-inner-item:hover": {
          color: "#868dfb !important",
        },
        "& .pro-menu-item.active": {
          color: "#6870fa !important",
        },
      }}
    >
      <ProSidebarProvider collapsed={isCollapsed}>
        <Menu iconShape="square">
          {/* LOGO AND MENU ICON */}
          <MenuItem
            onClick={() => setIsCollapsed(!isCollapsed)}
            icon={isCollapsed ? <MenuOutlinedIcon /> : undefined}
            style={{
              margin: "10px 0 20px 0",
              color: colors.grey[100],
            }}
          >
            {!isCollapsed && (
              <Box
                display="flex"
                justifyContent="space-between"
                alignItems="center"
                ml="15px"
              >
                <Typography variant="h3" color={colors.grey[100]}>
                  PRODDEO
                  <AccountTreeIcon />
                </Typography>
                <IconButton onClick={() => setIsCollapsed(!isCollapsed)}>
                  <MenuOutlinedIcon />
                </IconButton>
              </Box>
            )}
          </MenuItem>

          {!isCollapsed && (
            <Box mb="25px">
              <Box display="flex" justifyContent="center" alignItems="center">
                <img
                  alt="profile-user"
                  width="100px"
                  height="100px"
                  src={`../../assets/user.png`}
                  style={{ cursor: "pointer", borderRadius: "50%" }}
                />
              </Box>
              <Box textAlign="center">
                <Typography
                  variant="h2"
                  color={colors.grey[100]}
                  fontWeight="bold"
                  sx={{ m: "10px 0 0 0" }}
                >
                  Mark Zuckerberg
                </Typography>
                <Typography variant="h5" color={colors.greenAccent[500]}>
                {/* Chief Executive Officer of Facebook */}
                </Typography>
              </Box>
            </Box>
            )}

          <Box paddingLeft={isCollapsed ? undefined : "10%"}>
          <Link to="/">
            <Item
              title="Dashboard"
              icon={<HomeOutlinedIcon />}
              selected={selected}
              setSelected={setSelected}
            />
          </Link>

            <Link to="/">
            <Item 
              title="Projects"
              // icon={<HomeOutlinedIcon />}
              selected={selected}
              setSelected={setSelected} />
            {/* <Item
              title="Manage Team"
              icon={<PeopleOutlinedIcon />}
              selected={selected}
              setSelected={setSelected}
            />
            </Link>
            <Link to="/contacts">
            <Item
              title="Personal Information"
              icon={<ContactsOutlinedIcon />}
              selected={selected}
              setSelected={setSelected}
            />
            </Link>
            <Link to="/invoices">
            <Item
              title="Backlog"
              icon={<ReceiptOutlinedIcon />}
              selected={selected}
              setSelected={setSelected}
            /> */}
            {/* </Link>
            </SubMenu> */}
            </Link>
            <SubMenu label = "Pages">
            <Link to="/form">
            <Item
              title="Profile Form"
              icon={<PersonOutlinedIcon />}
              selected={selected}
              setSelected={setSelected}
            />
            </Link>
            <Link to="/calendar">
            <Item
              title="Calendar"
              icon={<CalendarTodayOutlinedIcon />}
              selected={selected}
              setSelected={setSelected}
            />
            </Link>
            <Link to="/faq">
            <Item
              title="FAQ Page"
              icon={<HelpOutlineOutlinedIcon />}
              selected={selected}
              setSelected={setSelected}
            />
            </Link>
            </SubMenu>
            <SubMenu label = "Charts/Diagrams">
            <Link to="/bar">
            <Item
              title="Bar Chart"
              icon={<BarChartOutlinedIcon />}
              selected={selected}
              setSelected={setSelected}
            />
            </Link>
            <Link to="/pie">
            <Item
              title="Pie Chart"
              icon={<PieChartOutlineOutlinedIcon />}
              selected={selected}
              setSelected={setSelected}
            />
            </Link>
            <Link to="/line">
            <Item
              title="Line Chart"
              icon={<TimelineOutlinedIcon />}
              selected={selected}
              setSelected={setSelected}
            />
            </Link>
            {/* <Link to="/geography">
            <Item
              title="Geography Chart"
              icon={<MapOutlinedIcon />}
              selected={selected}
              setSelected={setSelected}
            />
            </Link> */}
            <Link to="/UML">
             <Item
                title="UML Diagram"
                icon = {<SchemaIcon />}
                selected={selected}
                setSelected={setSelected}
             />
             </Link>
             </SubMenu>
          </Box>
        </Menu>
      </ProSidebarProvider>
    </Box>
  );
  };

export default Sidebar;