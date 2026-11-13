const { Sequelize, DataTypes } = require("sequelize");

const sequelize = new Sequelize("padron", "root", "", {
  host: "localhost",
  dialect: "mysql",
});

const Pasajero = sequelize.define("Pasajero", {
  ci: {
    type: DataTypes.BIGINT,
    allowNull: false,
    primaryKey: true,
    unsigned: true,
  },
  nombres: {
    type: DataTypes.STRING,
    allowNull: false,
  },
  apellidos: {
    type: DataTypes.STRING,
    allowNull: false,
  },
  celular: {
    type: DataTypes.INTEGER,
    allowNull: false,
    unsigned: true,
  },
  pasajeroFrecuente: {
    type: DataTypes.BOOLEAN,
    allowNull: false,
    defaultValue: false,
  },
}, {
    tableName: "pasajeros",
    allowNull: false,
});

Pasajero.sync();
module.exports = { sequelize, Pasajero };
