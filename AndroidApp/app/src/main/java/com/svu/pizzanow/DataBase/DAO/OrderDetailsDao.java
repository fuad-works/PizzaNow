package com.svu.pizzanow.DataBase.DAO;

import static androidx.room.OnConflictStrategy.REPLACE;

import androidx.room.Dao;
import androidx.room.Delete;
import androidx.room.Insert;
import androidx.room.Query;

import com.svu.pizzanow.Models.Order;
import com.svu.pizzanow.Models.OrderDetails;

import java.util.List;

@Dao
public interface OrderDetailsDao {
    @Delete
    void clear_all(List<OrderDetails> data);

    @Query("SELECT * FROM order_details")
    List<OrderDetails> get_all();

    @Insert(onConflict = REPLACE)
    long add_new(OrderDetails data);

    @Insert(onConflict = REPLACE)
    void add_all(List<OrderDetails> data);

    @Query("SELECT * FROM order_details WHERE id = :id")
    OrderDetails get_by_id(int id);

    @Delete
    void delete(OrderDetails cart);

    @Query("SELECT * FROM order_details WHERE order_id = :order_id" )
    List<OrderDetails> get_all_by_order_id(int order_id);
}
