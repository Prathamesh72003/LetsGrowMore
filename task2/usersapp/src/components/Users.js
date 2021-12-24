import React, { useState } from "react";
import "./Users.css";

const Users = () => {
  const [users, setUsers] = useState([]);
  const [loading, setLoading] = useState(false);

  const getUsers = async () => {
    const response = await fetch("https://reqres.in/api/users?page=1");
    const data = await response.json();
    // console.log(data.data);
    setUsers(data.data);
    setLoading(false);
  };

  const timeOut = () => {
    setTimeout(() => {
      getUsers();
    }, 3000);
  };

  const hideButton = () => {
    document.getElementById("btn").style.display = "none";
  };

  return (
    <>
      <div className="navbar">
        <div className="left">
          <p>AllUsers</p>
        </div>
        <div className="right" id="btn" onClick={() => {timeOut();setLoading(true);hideButton();}}>
          <button className="getUsers">Get Users</button>
        </div>
      </div>
      {loading ? (
        <div className="preloader">
          <div className="container">
            <div className="dot dot1"></div>
            <div className="dot dot2"></div>
            <div className="dot dot3"></div>
          </div>
        </div>
      ) : (
        <div className="cards">
          {users.map((item) => {
            return (
              <div className="card">
                <div className="image">
                  <img className="image" src={item.avatar} alt="" />
                </div>

                <div className="id">
                  <p className="card_text">{item.id}</p>
                </div>

                <div className="email">
                  <p className="card_text">{item.email}</p>
                </div>

                <div className="name">
                  <p className="card_text">
                    {item.first_name} {item.last_name}
                  </p>
                </div>
              </div>
            );
          })}
        </div>
      )}
    </>
  );
};

export default Users;
