const {GraphQLObjectType, GraphQLString, GraphQLInt, GraphQLSchema, GraphQLList, GraphQLBoolean} = require('graphql');
const { Pasajero } = require('./database');

const PasajeroType = new GraphQLObjectType({
  name: 'Pasajero',
  fields: () => ({
    ci: { type: GraphQLInt },
    nombres: { type: GraphQLString },
    apellidos: { type: GraphQLString },
    celular: { type: GraphQLString },
    pasajeroFrecuente: { type: GraphQLBoolean},
  }),
});

const RootQuery = new GraphQLObjectType({
  name: 'RootQueryType',
  fields: {
    pasajeros: {
      type: new GraphQLList(PasajeroType),
      resolve(parent, args) {
        return Pasajero.findAll();
      }
    },
    pasajero: {
      type: PasajeroType,
      args: { ci: { type: GraphQLInt } },
      resolve(parent, args) {
        if(args.ci){
            return Pasajero.findByPk(args.ci);
        }else{
            throw new Error("pasajero no registrado");
        }
      }
    }
  }
});

const Mutation = new GraphQLObjectType({
  name: 'Mutation',
  fields: {
    registrarPasajero: {
      type: PasajeroType,
      args: {
        ci: { type: GraphQLInt },
        nombres: { type: GraphQLString },
        apellidos: { type: GraphQLString },
        celular: { type: GraphQLInt },
      },
      resolve(parent, args) {
        if(args.ci>= 10000 && args.ci <= 99999999) {
          return Pasajero.create(args);
        } else {
          throw new Error("CI debe ser entre 5 y10 digitos");
        }
      }
    }
  }
});

module.exports = new GraphQLSchema({
  query: RootQuery,
  mutation: Mutation
});