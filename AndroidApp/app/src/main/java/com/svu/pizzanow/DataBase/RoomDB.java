package com.svu.pizzanow.DataBase;

import android.content.Context;

import androidx.room.Database;
import androidx.room.Room;
import androidx.room.RoomDatabase;

import com.svu.pizzanow.DataBase.DAO.CartDao;
import com.svu.pizzanow.DataBase.DAO.OrderDao;
import com.svu.pizzanow.DataBase.DAO.OrderDetailsDao;
import com.svu.pizzanow.DataBase.DAO.ProductDao;
import com.svu.pizzanow.Models.Cart;
import com.svu.pizzanow.Models.Order;
import com.svu.pizzanow.Models.OrderDetails;
import com.svu.pizzanow.Models.Product;

@Database(entities = {Product.class, OrderDetails.class, Order.class, Cart.class},version = 1,exportSchema = false)
public abstract class RoomDB extends RoomDatabase {
    private static RoomDB database;
    private static String DATABASE_NAME = "pizza_now_db";

    public synchronized static RoomDB getInstance(Context context)
    {
        if(database == null)
        {
            database = Room.databaseBuilder(context.getApplicationContext(),RoomDB.class,DATABASE_NAME)
                    .allowMainThreadQueries()
                    .fallbackToDestructiveMigration()
                    .build();
        }

        return database;
    }

    public abstract ProductDao product_dao();
    public abstract OrderDao order_dao();
    public abstract OrderDetailsDao order_details_dao();
    public abstract CartDao cart_dao();

}