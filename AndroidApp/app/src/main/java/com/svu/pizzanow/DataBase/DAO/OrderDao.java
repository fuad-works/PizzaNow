package com.svu.pizzanow.DataBase.DAO;

import static androidx.room.OnConflictStrategy.REPLACE;

import androidx.room.Dao;
import androidx.room.Delete;
import androidx.room.Insert;
import androidx.room.Query;
import androidx.room.Update;

import com.svu.pizzanow.Models.Order;
import com.svu.pizzanow.Models.Product;

import java.util.List;

@Dao
public interface OrderDao {
    @Delete
    void clear_all(List<Order> data);

    @Query("SELECT * FROM orders")
    List<Order> get_all();

    @Insert(onConflict = REPLACE)
    long add_new(Order data);

    @Insert(onConflict = REPLACE)
    void add_all(List<Order> data);

    @Query("SELECT * FROM orders WHERE id = :id")
    Order get_by_id(int id);

    @Delete
    void delete(Order cart);

}
